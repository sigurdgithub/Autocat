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
     * Store a new flight in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request...
 
        $flight = new Notification;
 
        $flight->cat_id = $request->cat;
        $flight->type = $request->type;
        $flight->message = $request->message;
        
        $flight->sentByShelter = 0;
        
        $flight->fosterFamily_id = $request->fosterFamily;

 
        $flight->save();
        return redirect()->route('notifications', ['fosterId' => $request->fosterFamily]);
    }

    public function delete($id) {
        $notifications = Notification::find($id)->delete();
        $notifications = Notification::all();
        foreach ($notifications as $notification) {
            $fId = $notification->fosterFamily_id;
        }
        //dd($notifications[0]->fosterFamilyId);
        return redirect()->route('notifications', ['fosterId' => $fId]);
    }

    public function showShelterNotifications()
    {
        $matchCase = ['sentByShelter' => 1];
        $notifications = Notification::where($matchCase)->get();
        //$notifications = Notification::all();
        //dd($notifications[0]->fosterFamily);
        
        //dd($notifications);
        return view('shelterDashboard', ['notifications' => $notifications]);

    }

}
