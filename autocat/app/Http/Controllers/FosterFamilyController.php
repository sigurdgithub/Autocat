<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FosterFamily;
use App\Models\Cat;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;



class FosterFamilyController extends Controller
{
    public static function getFosterFamilies()
    {
        $fosterFamilies = FosterFamily::all();
        return $fosterFamilies;
    }
    public static function getFosterFamiliesByCatId($catId)
    {
        $fosterFamilyId = Cat::find($catId)->fosterFamily_id;
        $fosterFamily = FosterFamily::find($fosterFamilyId);

        return $fosterFamily;
    }
    public function getFosterFamilyById($id) {
        return FosterFamily::findOrFail($id);
    }

    public function filterFosterFamiliesByString($string) {
        $fosterFamilies = DB::table('fosterFamilies')->select('fosterFamilies.*');
        $fosterFamilies = $fosterFamilies->where('fosterFamilies.firstName', 'LIKE', '%'.$string.'%')
        ->orWhere('fosterFamilies.lastName', 'LIKE', '%'.$string.'%');
        $result = $fosterFamilies->get();
        return json_encode($result);
    }

    public function filterFosterFamilies(Request $request) {
        $data = $request->all();
        $fosterFamilies = DB::table('fosterFamilies')->leftJoin('foster_preferences', 'fosterFamilies.id', '=', 'foster_preferences.fosterFamily_id');
        //$fosterFamilies = $fosterFamilies->where('foster_preferences.adult', '=', 1);

        $result = $fosterFamilies->get();
        return json_encode($result);
    }

}
