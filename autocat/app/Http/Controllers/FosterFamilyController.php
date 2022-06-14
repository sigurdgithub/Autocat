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
    public function getFosterFamilyById($id)
    {
        return FosterFamily::findOrFail($id);
    }

    private static function checkKids($query)
    {
        $query = $query;
        return $query;
    }

    private static function filterHomeSituation($value, $query)
    {
        if (is_array($value)) {
            $first = true;
            foreach ($value as $val) {
                if (str_ends_with($val, 'kids')) {
                    if ($first) {
                        $first = false;
                        $query = $query->where('Solo', explode(' ', $val)[1]);
                    } else {
                        $query = $query->orWhere('Solo', explode(' ', $val)[1]);
                    }
                } else if (str_ends_with($val, 'pets')) {
                    if ($first) {
                        $first = false;
                        $query = $query->where('withPet', explode(' ', $val)[1]);
                    } else {
                        $query = $query->orWhere('withPet', explode(' ', $val)[1]);
                    }
                } else if (str_ends_with($val, 'dogs')) {
                    if ($first) {
                        $first = false;
                        $query = $query->where('gardenAccess', explode(' ', $val)[1]);
                    } else {
                        $query = $query->orWhere('gardenAccess', explode(' ', $val)[1]);
                    }
                } else if (str_ends_with($val, 'cats')) {
                    if ($first) {
                        $first = false;
                        $query = $query->where('gardenAccess', explode(' ', $val)[1]);
                    } else {
                        $query = $query->orWhere('gardenAccess', explode(' ', $val)[1]);
                    }
                }
            }
            return $query;
        } else {
            if (str_starts_with($value, 'Solo')) {
                return $query->where('Solo', explode(' ', $value)[1]);
            } else if (str_starts_with($value, 'Huisdier')) {
                return $query->where('withPet', explode(' ', $value)[1]);
            } else if (str_starts_with($value, 'Tuin')) {
                return $query->where('gardenAccess', explode(' ', $value)[1]);
            }
        }
    }

    public function filterFosterFamiliesByString($string)
    {
        $fosterFamilies = DB::table('fosterFamilies')->select('fosterFamilies.*');
        $fosterFamilies = $fosterFamilies->where('fosterFamilies.firstName', 'LIKE', '%' . $string . '%')
            ->orWhere('fosterFamilies.lastName', 'LIKE', '%' . $string . '%');
        $result = $fosterFamilies->get();
        return json_encode($result);
    }

    public function filterFosterFamilies(Request $request)
    {
        $data = $request->all();

        $fosterFamilies = DB::table('fosterFamilies')->leftJoin('foster_preferences', 'fosterFamilies.id', '=', 'foster_preferences.fosterFamily_id')->join('roommates', 'fosterFamilies.id', '=', 'roommates.fosterFamily_id');
        //$fosterFamilies = $fosterFamilies->where('foster_preferences.adult', '=', 1);
        if (isset($data['availableSpots'])) {
            $fosterFamilies = $fosterFamilies->where('availableSpots', '=', $data['availableSpots']);
        }
        if (isset($data['livingStatus'])) {
            $fosterFamilies = FosterFamilyController::filterHomeSituation($data['livingStatus'], $fosterFamilies);
        }
        $result = $fosterFamilies->get();
        dd($result);
        return json_encode($result);
    }
}
