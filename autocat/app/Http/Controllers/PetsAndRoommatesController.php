<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FosterFamily;
use App\Models\Pet;
use App\Models\Roommate;
use Illuminate\Database\Eloquent\Builder;


class PetsAndRoommatesController extends Controller
{
    public static function showPetsByFosterId($fosterId)
    {
        $matchCase = ['fosterFamily_id'=> $fosterId];
        return Pet::where($matchCase)->get();
    }

    public static function showRoommatesByFosterId($fosterId)
    {
        $matchCase = ['fosterFamily_id'=> $fosterId];
        return Roommate::where($matchCase)->get();
    }

    public function deletePet($id) {
        $pet = Pet::find($id);
        $fosterFamily_id = $pet->fosterFamily_id;
        $pet->delete();
        return redirect()->route('fosterAccount', $fosterFamily_id);
    }

    public function deleteRoommate($id) {
        $roommate = Roommate::find($id);
        $fosterFamily_id = $roommate->fosterFamily_id;
        $roommate->delete();
        return redirect()->route('fosterAccount', $fosterFamily_id);
    }

    public function storePet(Request $request)
    {   
        $validation = $request->validate([
            'species'=> 'required',
            'dateOfBirthPet'=>'required',
        ]);

        $pet = Pet::firstOrCreate(
            ['fosterFamily_id' => $request->input('fosterFamily_id'),
            'species' => $request->input('species'),
            'dateOfBirth' => $request->input('dateOfBirthPet'),
            ]);
        
        return redirect()->route('fosterAccount', $request->input('fosterFamily_id'));
    }

    public function storeRoommate(Request $request)
    {   
/*         dd($request);
 */        $validation = $request->validate([
            'relation'=> 'required',
            'dateOfBirthRoommate'=>'required',
        ]);

        $roommate = Roommate::firstOrCreate(
            ['fosterFamily_id' => $request->input('fosterFamily_id'),
            'relation' => $request->input('relation'),
            'dateOfBirth' => $request->input('dateOfBirthRoommate'),
            ]);
        
        return redirect()->route('fosterAccount', $request->input('fosterFamily_id'));
    }
}
