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
        
        //dd($notifications);
        return view('fosterDashboard', ['notifications' => $notifications]);

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
