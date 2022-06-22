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

    public function showShelterNotifications()
    {
        $notifications = NotificationController::getShelterNotifications();
        $cats = CatController::getCats();
        $fosterFamilies = FosterFamilyController::getFosterFamilies();
        //dd($resultCats);
        return view('shelterDashboard', ['notifications' => $notifications, 'cats' => $cats, 'fosterFamilies' => $fosterFamilies]);
    }

    public function getCatsByFosterId($fosterId)
    {
        $cats = CatController::getCatsByFosterIdModal($fosterId);
        return json_encode($cats);
    }

    // (AJAX) Functions for the matchmaker

    private static function checkCatOnFosterPref($fosterPreference, $query) {
        if ($fosterPreference->adult) { 
            if ($fosterPreference->kitten) { $query = CatController::filterAge(["adult", "kitten"], $query); }
            else { $query = CatController::filterAge(["adult"], $query); }
        } else if ($fosterPreference->kitten) { $query = CatController::filterAge(["kitten"], $query);}
        $query = $query->where(function($query) use ($fosterPreference) {
            if ($fosterPreference->bottleFeeding) { $query = $query->orWhere("catPreferences.bottleFeeding", '=', 1); }
            if ($fosterPreference->noIntensiveCare) { $query = $query->orWhere("catPreferences.noIntensiveCare", '=', 1); }
            if ($fosterPreference->intensiveCare) { $query = $query->orWhere("catPreferences.intensiveCare", '=', 1); }
            if ($fosterPreference->pregnant) { $query = $query->orWhere("catPreferences.pregnancy", '=', 1); }
            
        });
        if ($fosterPreference->bottleFeeding) { $query = CatController::basicFilter([1], $query, "catPreferences.bottleFeeding", true); }
        if ($fosterPreference->noIntensiveCare) { $query = CatController::basicFilter([1], $query, "catPreferences.noIntensiveCare", true); }
        if ($fosterPreference->intensiveCare) { $query = CatController::basicFilter([1], $query, "catPreferences.intensiveCare", true); }
        if ($fosterPreference->pregnant) { $query = CatController::basicFilter([1], $query, "catPreferences.pregnancy", true); }
        
        if ($fosterPreference->scared) { 
            if ($fosterPreference->feral) { $query = CatController::basicFilter(["Bang", "Wild"], $query, "cats.socialization"); }
            else { $query = CatController::basicFilter(["Bang"], $query, "cats.socialization"); }
        } else if ($fosterPreference->feral) { $query = CatController::basicFilter(["Wild"], $query, "cats.socialization");}
        
        
        //$query = CatController::filterAge("", $query);
        return $query;
    }

    private static function checkFostersOnCatPref($cat, $query) {
        $filterInput = [(CatController::getCatAgeCategory($cat) == "kitten" ? "kitten" : "adult")];
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
        //dd($query->get());
        return $query;
    }

    /**
     * Get all cats that can be matched to the selected fosterFamily
     * @param $fosterId, This parameter is the id of the selected fosterFamily
     * @return $cats, Return json_encoded array of the cats that can be placed with the selected fosterFamily
     */
    public function getCatsBySelectedFoster($fosterId) {
        if ($fosterId < 0 ) {return json_encode(FosterFamily::all()); }
        else {
            $selectedFoster = FosterFamily::findOrFail($fosterId);
            
            $cats = DB::table('cats')->select('cats.*')->join('catPreferences', 'cats.id', '=', 'catPreferences.cat_id');
            $cats = DashBoardController::checkCatOnFosterPref($selectedFoster->preferences, $cats);
            $cats = $cats->toSql();
            return json_encode($cats);//->get());
        }
    }

    public function getFosterFamiliesBySelectedCat($catId) {
        if ($catId < 0 ) {return json_encode(Cat::whereNull("fosterFamily_id")->get());}
        else {
            $selectedCat = Cat::findOrFail($catId);
            $fosterFamilies = DB::table('fosterFamilies')->select("fosterFamilies.*")->leftJoin('foster_preferences', 'fosterFamilies.id', '=', 'foster_preferences.fosterFamily_id');
            $fosterFamilies = DashBoardController::checkFostersOnCatPref($selectedCat, $fosterFamilies);
            return json_encode($fosterFamilies->get());
        }
    }
}
