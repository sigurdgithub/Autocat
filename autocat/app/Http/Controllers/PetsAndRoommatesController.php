<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FosterFamily;
use App\Models\Pet;
use App\Models\Roommate;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Crypt;


class PetsAndRoommatesController extends Controller
{
    public static function showPetsByFosterId($fosterId)
    {
        $matchCase = ['fosterFamily_id' => $fosterId];
        return Pet::where($matchCase)->get();
    }

    public static function showRoommatesByFosterId($fosterId)
    {
        $matchCase = ['fosterFamily_id' => $fosterId];
        return Roommate::where($matchCase)->get();
    }

    public function deletePet($id)
    {
        $pet = Pet::find($id);
        //Get fosterFamily Id
        $fosterFamily_id = $pet->fosterFamily_id;
        $pet->delete();
        $foster_id_crypt = Crypt::encryptString($fosterFamily_id);
        return redirect()->route('fosterAccount', $foster_id_crypt);
    }

    public function deleteRoommate($id)
    {
        $roommate = Roommate::find($id);
        //Get fosterFamily Id
        $fosterFamily_id = $roommate->fosterFamily_id;
        $roommate->delete();
        $foster_id_crypt = Crypt::encryptString($fosterFamily_id);
        return redirect()->route('fosterAccount', $foster_id_crypt);
    }

    public function storePet(Request $request)
    {   //Validate
        $validation = $request->validate([
            'species' => 'required',
            'dateOfBirthPet' => 'required',
        ]);

        //Store
        $pet = Pet::firstOrCreate(
            [
                'fosterFamily_id' => $request->input('fosterFamily_id'),
                'species' => $request->input('species'),
                'dateOfBirth' => $request->input('dateOfBirthPet'),
            ]
        );
        $foster_id_crypt = Crypt::encryptString(auth()->user()->fosterFamily_id);
        return redirect()->route('fosterAccount', $foster_id_crypt);
    }

    public function storeRoommate(Request $request)
    {   //Validate    
        /* dd($request); */
        $validation = $request->validate([
            'relation' => 'required',
            'dateOfBirthRoommate' => 'required',
        ]);

        //Store

        $roommate = Roommate::firstOrCreate(
            [
                'fosterFamily_id' => $request->input('fosterFamily_id'),
                'relation' => $request->input('relation'),
                'dateOfBirth' => $request->input('dateOfBirthRoommate'),
            ]
        );
        $foster_id_crypt = Crypt::encryptString(auth()->user()->fosterFamily_id);

        return redirect()->route('fosterAccount', $foster_id_crypt);
    }
}
