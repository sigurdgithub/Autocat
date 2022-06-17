<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\Cat;
use App\Models\FosterFamily;
use Illuminate\Database\Eloquent\Builder;


class NotificationController extends Controller
{
    public static function getNotificationsByFosterId($fosterId)
    {
        $matchCase = ['fosterFamily_id'=> $fosterId, 'sentByShelter' => 1];
        return Notification::where($matchCase)->get();
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
        //$validated = $request->validate(['cat' => 'required|integer', 'type' => 'required', 'message' => 'required']);
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

    public static function getShelterNotifications()
    {
        $matchCase = ['sentByShelter' => 0];
        return Notification::where($matchCase)->get();
    }

    public function getCatsByFosterId($fosterId) {
        $cats = CatController::getCatsByFosterIdModal($fosterId);
        return json_encode($cats);
    }

}
