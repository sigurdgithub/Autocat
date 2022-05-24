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

    public function getCatById($id) 
    {
        return Cat::findOrFail($id);
    }

    public function storeCat(Request $request)
    {   
        // Validate the request
        $validation = $request->validate([
            'name'=> 'required',
            'adoptionStatus'=>'required'
        ]);

        $timestamp = now()->timestamp;

        // Store
        $cat = Cat::firstOrCreate(
            ['gender' => $request->input('gender'),
            'name' => $request->input('name'),
            'dateOfBirth' => $request->input('dateOfBirth'),
            'furColor' => $request->input('furColor'),
            'furLength' => $request->input('furLength'),
            'chipNumber' => $request->input('chipNumber'),
            'adoptionStatus' => $request->input('adoptionStatus'),
            'notifierName' => $request->input('notifierName'),
            'notifierPhone' => $request->input('notifierPhone'),
            'socialization' => $request->input('socialization'),
            'startWeight' => $request->input('startWeight'),
            'sterilized' => $request->input('sterilized'),
            'extraInfo' => $request->input('extraInfo'),
            'medication' => $request->input('medication'),
            'personality' => $request->input('personality'),
            'solo' => $request->input('solo'),
            'withPet' => $request->input('withPet'),
            'gardenAccess' => $request->input('gardenAccess'),
            'buddyId' => $request->input('buddyId'),
            'image' => $request->input('image')
            ]);
        
        $cat->save();
        // dd($cat->latest()->first()->id);

        //$lastcat = Cat::findOrFail($cat->latest()->first()->id);
        $cats = Cat::all();
        $lastcat = $cat->latest()->first();
        return view('catDetail', compact('lastcat', 'cats'));
    }

    public function showCatById($id)
    {
        $cat = Cat::findOrFail($id);
        $cats = Cat::all();
        return view('catDetail', ['cat' => $cat, 'cats' => $cats]);
    }
}
