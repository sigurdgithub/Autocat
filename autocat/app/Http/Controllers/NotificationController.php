<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\Cat;
use App\Models\FosterFamily;
use Illuminate\Database\Eloquent\Builder;


class NotificationController extends Controller
{
    public function showByFosterId($fosterId)
    {
        $matchCase = ['fosterFamily_id'=> $fosterId, 'sentByShelter' => 1];
        $notifications = Notification::where($matchCase)->get();
        //$notifications = Notification::all();
        $cats = CatController::getCatsByFosterId($fosterId);
        //dd($notifications);
        return view('fosterDashboard', ['notifications' => $notifications, 'cats' => $cats,'fosterFamily' => $fosterId]);

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
 
        $notification = new Notification;
 
        $notification->cat_id = $request->cat;
        $notification->type = $request->type;
        $notification->message = $request->message;
        
        $notification->sentByShelter = 0;
        
        $notification->fosterFamily_id = $request->fosterFamily;

 
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
 
        $notification->cat_id = $request->cat;
        $notification->type = $request->type;
        $notification->message = $request->message;
        
        $notification->sentByShelter = 1;
        
        $notification->fosterFamily_id = $request->fosterFamily;

 
        $notification->save();
        return redirect()->route('shelterNotifications');
    }

    public function delete($id) {
        $notification = Notification::find($id);
        $sentByShelter = $notification->sentByShelter;
        $fId = $notification->fosterFamily_id;
        $notification->delete();
        //dd($notifications[0]->fosterFamilyId);
        if ($sentByShelter) {
            return redirect()->route('notifications', ['fosterId' => $fId]);
        }
        else {
            return redirect()->route('shelterNotifications');
        }
    }

    public function showShelterNotifications()
    {
        $matchCase = ['sentByShelter' => 0];
        $notifications = Notification::where($matchCase)->get();
        //$notifications = Notification::all();
        $cats = CatController::getCats();
        $resultCats = array();
        foreach ($cats as $cat) {
            $fosterFamilies = FosterFamilyController::getFosterFamiliesByCatId($cat->id);
            $resultCats[] = ['catId' => $cat->id, 'catName' => $cat->name, 
            'fosterId' => $cat->fosterFamily_id, 'fosterFirstName' => $fosterFamilies->firstName, 'fosterLastName' => $fosterFamilies->lastName];
        }
        $fosterFamilies = FosterFamilyController::getFosterFamilies();
        //dd($resultCats);
        return view('shelterDashboard', ['notifications' => $notifications, 'cats' => $cats, 'fosterFamilies' => $fosterFamilies]);

    }

    public function getCatsByFosterId($fosterId) {
        $cats = CatController::getCatsByFosterIdModal($fosterId);
        return json_encode($cats);
    }

}
