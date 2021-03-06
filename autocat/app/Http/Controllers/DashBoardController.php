<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\Cat;
use App\Models\FosterFamily;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashBoardController extends Controller
{
    public function showByFosterId($fosterId)
    {
        $foster = Auth::user()->fosterFamily_id;
        $notifications = NotificationController::getNotificationsByFosterId($foster);
        $cats = CatController::getCatsByFosterId($foster);
        //dd($notifications);
        return view('fosterDashboard', ['notifications' => $notifications, 'cats' => $cats, 'fosterFamily' => $foster]);
    }

    /**
     * Store a new Notification in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request...
        //$validated = $request->validate(['cat' => 'required|integer', 'type' => 'required', 'message' => 'required']);

        $notification = new Notification;

        if (is_numeric($request->cat)) { $notification->cat_id = $request->cat; }
        else { $notification->cat_id = null; }
        $notification->type = $request->type;
        $notification->message = $request->message;

        $notification->sentByShelter = 0;

        $notification->fosterFamily_id = Auth::user()->fosterFamily_id;


        $notification->save();
        return redirect()->route('notifications', ['fosterId' => $request->fosterFamily]);
    }
    /**
     * Store a new  shelterNotification in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeShelter(Request $request)
    {
        // Validate the request...

        $notification = new Notification;

        if (is_numeric($request->cat)) { $notification->cat_id = $request->cat; }
        else { $notification->cat_id = null; }
        $notification->type = $request->type;
        $notification->message = $request->message;

        $notification->sentByShelter = 1;

        $notification->fosterFamily_id = $request->fosterFamily;


        $notification->save();
        return redirect()->route('shelterNotifications');
    }

    /**
     * Delete a notification
     * @param integer $id the id of the notification to be deleted
     */
    public function delete($id)
    {
        $notification = Notification::find($id);
        $sentByShelter = $notification->sentByShelter;
        $fId = $notification->fosterFamily_id;
        $notification->delete();
        //dd($notifications[0]->fosterFamilyId);
        if ($sentByShelter) {
            return redirect()->route('notifications', ['fosterId' => $fId]);
        } else {
            return redirect()->route('shelterNotifications');
        }
    }

    // Show all notifications that are sent to the shelter
    public function showShelterNotifications()
    {
        $notifications = NotificationController::getShelterNotifications();
        $cats = CatController::getCats();
        $fosterFamilies = FosterFamilyController::getFosterFamilies();
        //dd($resultCats);
        return view('shelterDashboard', ['notifications' => $notifications, 'cats' => $cats, 'fosterFamilies' => $fosterFamilies]);
    }

    /**
     * Get the cats that have been assigned to a given fosterFamily in a json-encoded array
     * @param integer $fosterId the id of the fosterFamily that we want to get the cats from
     * @return array $cats a json-encoded array containing all cats (the name and id only) assigned to the given fosterFamily
     */
    public function getCatsByFosterId($fosterId)
    {
        $cats = CatController::getCatsByFosterIdModal($fosterId);
        return json_encode($cats);
    }

    // (AJAX) Functions for the matchmaker

    /**
     * Apply a filter to the given query that filters the fosterFamilies based on the preferences of the cat that is given
     * @param Cat $cat the cat on whose preferences is to be filtered
     * @param QueryBuilder $query the query builder that we need to add aditional where clauses to based on the given cat
     * @return QueryBuilder $query the given query builder appended by the where clauses for each preference of the given cat
     */
    private static function checkFostersOnCatPref($cat, $query) 
    {
        $filterInput = [(CatController::getCatAgeCategory($cat) == "kitten" ? "kitten" : "adult")];
        if (isset($cat->preferences)) {
            $catPreferences = $cat->preferences;
            if ($cat->socialization == "Bang") { $filterInput[] = "scared"; }
            if ($cat->socialization == "Wild") { $filterInput[] = "feral"; }
            if ($catPreferences->bottleFeeding) { $filterInput[] = "bottleFeeding"; }
            if ($catPreferences->noIntensiveCare){ $filterInput[] = "noIntensiveCare"; }
            if ($catPreferences->intensiveCare) { $filterInput[] = "intensiveCare"; }
            if ($catPreferences->pregnancy) { $filterInput[] = "pregnant"; }
            if ($catPreferences->isolation) { $filterInput[] = "isolation"; }
            $query = FosterFamilyController::filterByCatPref($filterInput, $query, true);
            $houseFilter = [];
            if (!$catPreferences->dogs) { $houseFilter[] = "no dogs"; }
            if (!$catPreferences->cats) { $houseFilter[] = "no cats"; }
            if (!$catPreferences->kids) { $houseFilter[] = "no kids"; }
            if ($houseFilter != []) { $query = FosterFamilyController::filterHomeSituation($houseFilter, $query, true); }
        }
        
        //dd($query->get());
        return $query;
    }

    /**
     * Get all fosterFamilies that can be matched to the selected cat
     * @param integer $catId The id of the selected cat
     * @return array $cats Return json_encoded array of the fosterFamilies that can be placed with the selected cat
     */
    public function getFosterFamiliesBySelectedCat($catId) 
    {
        if ($catId < 0 ) {return json_encode(Cat::whereNull("fosterFamily_id")->get());}
        else {
            $selectedCat = Cat::findOrFail($catId);
            $fosterFamilies = DB::table('fosterFamilies')->select("fosterFamilies.*")->leftJoin('foster_preferences', 'fosterFamilies.id', '=', 'foster_preferences.fosterFamily_id');
            $fosterFamilies = DashBoardController::checkFostersOnCatPref($selectedCat, $fosterFamilies);
            $tmp = json_decode(json_encode($fosterFamilies->get()), true);
            $result = [];
            foreach ($tmp as $foster) {
                if ($foster['availableSpots']-FosterFamilyController::getAmountOfCats($foster['id']) > 0) {
                    $result[] = $foster;
                }
            }
            return json_encode($result);
        }
    }
}
