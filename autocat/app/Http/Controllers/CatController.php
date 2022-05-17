<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cat;
use Illuminate\Database\Eloquent\Builder;


class CatController extends Controller
{
    public static function getCatsByFosterId($fosterId)
    {
        $matchCase = ['fosterFamily_id'=> $fosterId];
        $cats = Cat::where($matchCase)->get();
        //$notifications = Notification::all();
        
        //dd($cats);
        return $cats;
        //return view('fosterDashboard', ['cats' => $cats]);

    }
    public static function getCatsByFosterIdModal($fosterId)
    {
        $matchCase = ['fosterFamily_id'=> $fosterId];
        $cats = Cat::select('id','name')->where($matchCase)->get();
        //$notifications = Notification::all();
        
        //dd($cats);
        return $cats;
        //return view('fosterDashboard', ['cats' => $cats]);

    }
    public static function getCats()
    {
        $cats = Cat::all();
        return $cats;
    }
    

}
