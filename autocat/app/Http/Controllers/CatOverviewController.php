<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\Cat;
use App\Models\FosterFamily;
use Illuminate\Database\Eloquent\Builder;


class CatOverviewController extends Controller
{
    public function showByFosterId($fosterId)
    {
        $notifications = NotificationController::getNotificationsByFosterId($fosterId);
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

    public function getCats()
    {
        $cats = CatController::getCats();
        //dd($resultCats);
        $fosterfamilies = FosterFamilyController::getFosterFamilies();
        return view('catOverview', ['cats' => $cats, 'fosterFamilies' => $fosterfamilies]);

    }

    public function getCatsByFosterId($fosterId) {
        $cats = CatController::getCatsByFosterIdModal($fosterId);
        return json_encode($cats);
    }

}
