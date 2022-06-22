<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FosterFamily;
use App\Models\Cat;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;



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
        $result = FosterFamily::findOrFail($id);
        $result = json_decode(json_encode($result), true);
        $result['hashed'] = Crypt::encryptString($result['id']);
        return json_encode($result);
    }

    public function getPreferenceByFosterId($id) {
        $result = [];
        $result['preferences'] = json_decode(json_encode(FosterFamily::findOrFail($id)->preferences));
        $result['pets'] = json_decode(json_encode(FosterFamily::findOrFail($id)->pets));
        $result['roommates'] = json_decode(json_encode(FosterFamily::findOrFail($id)->roommates));        
        $result['email'] = User::where('fosterFamily_id', $id)->select('email')->first();        
        return json_encode($result);
    }

    public static function filterByCatPref($value, $query, $noOr = false)
    {
        if (is_array($value)) {
            $first = true;
            foreach ($value as $val) {
                if (!strcmp($val, 'adult')) {
                    if ($first) {
                        $first = false;
                        $query = $query->where('foster_preferences.adult', 1);
                    } else if ($noOr) {
                        $query = $query->where('foster_preferences.adult', 1);
                    } else {
                        $query = $query->orWhere('foster_preferences.adult', 1);
                    }
                } else if (!strcmp($val, 'pregnant')) {
                    if ($first) {
                        $first = false;
                        $query = $query->where('foster_preferences.pregnant', 1);
                    } else if ($noOr) {
                        $query = $query->where('foster_preferences.pregnant', 1);
                    } else {
                        $query = $query->orWhere('foster_preferences.pregnant', 1);
                    }
                } else if (!strcmp($val, 'kitten')) {
                    if ($first) {
                        $first = false;
                        $query = $query->where('foster_preferences.kitten', 1);
                    } else if ($noOr) {
                        $query = $query->where('foster_preferences.kitten', 1);
                    }else {
                        $query = $query->orWhere('foster_preferences.kitten', 1);
                    }
                } else if (!strcmp($val, 'bottleFeeding')) {
                    if ($first) {
                        $first = false;
                        $query = $query->where('foster_preferences.bottleFeeding', 1);
                    } else if ($noOr) {
                        $query = $query->where('foster_preferences.bottleFeeding', 1);
                    }else {
                        $query = $query->orWhere('foster_preferences.bottleFeeding', 1);
                    }
                } else if (!strcmp($val, 'scared')) {
                    if ($first) {
                        $first = false;
                        $query = $query->where('foster_preferences.scared', 1);
                    } else if ($noOr) {
                        $query = $query->where('foster_preferences.scared', 1);
                    }else {
                        $query = $query->orWhere('foster_preferences.scared', 1);
                    }
                } else if (!strcmp($val, 'feral')) {
                    if ($first) {
                        $first = false;
                        $query = $query->where('foster_preferences.feral', 1);
                    } else if ($noOr) {
                        $query = $query->where('foster_preferences.feral', 1);
                    }else {
                        $query = $query->orWhere('foster_preferences.feral', 1);
                    }
                } else if (!strcmp($val, 'intensiveCare')) {
                    if ($first) {
                        $first = false;
                        $query = $query->where('foster_preferences.intensiveCare', 1);
                    } else if ($noOr) {
                        $query = $query->where('foster_preferences.intensiveCare', 1);
                    }else {
                        $query = $query->orWhere('foster_preferences.intensiveCare', 1);
                    }
                } else if (!strcmp($val, 'noIntensiveCare')) {
                    if ($first) {
                        $first = false;
                        $query = $query->where('foster_preferences.noIntensiveCare', 1);
                    } else if ($noOr) {
                        $query = $query->where('foster_preferences.noIntensiveCare', 1);
                    } else {
                        $query = $query->orWhere('foster_preferences.noIntensiveCare', 1);
                    }
                } else if (!strcmp($val, 'isolation')) {
                    if ($first) {
                        $first = false;
                        $query = $query->where('foster_preferences.isolation', 1);
                    } else if ($noOr) {
                        $query = $query->where('foster_preferences.isolation', 1);
                    }else {
                        $query = $query->orWhere('foster_preferences.isolation', 1);
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

    public static function filterChildren() {
        $now = Carbon::now()->subYears(12)->toDateString();
        $query =  DB::table('fosterFamilies')->crossJoin('roommates', 'fosterFamilies.id', '=', 'roommates.fosterFamily_id')->select('fosterFamilies.*');
        $result = $query->where('roommates.dateOfBirth', '>', $now)->get();
        return $result;
    }

    // TODO: Depends on roommates and pets
    // Returns a collection of all foster families that DON'T comply with the criteria
    public static function filterHomeSituation($value, $query, $noOr = false) {
        //$query =  DB::table('fosterFamilies')->leftJoin('pets', 'fosterFamilies.id', '=', 'pets.fosterFamily_id')->select('fosterFamilies.*');
        if (is_array($value)) {
            $first = true;
            foreach ($value as $val) {
                if (str_ends_with($val, 'kids')) {
                    $now = Carbon::now()->subYears(12)->toDateString();
                    $subQuery = DB::table('fosterFamilies')->join('roommates', 'fosterFamilies.id', '=', 'roommates.fosterFamily_id')->select('fosterFamilies.id');
                    $subQuery = $subQuery->where('roommates.dateOfBirth', '>', $now); 
                    if ($first) {
                        $first = false;
                        $query = $query->whereNotIn('fosterFamilies.id', $subQuery);
                    } else if ($noOr) {
                        $query = $query->whereNotIn('fosterFamilies.id', $subQuery);
                    } else {
                        $query = $query->orWhereNotIn('fosterFamilies.id', $subQuery);
                    }
                } else if (str_ends_with($val, 'pets')) {
                    $subQuery = DB::table('fosterFamilies')->join('pets', 'fosterFamilies.id', '=', 'pets.fosterFamily_id')->select('fosterFamilies.id');
                    if ($first) {
                        $first = false;
                        $query = $query->whereNotIn('fosterFamilies.id', $subQuery);
                    } else if ($noOr) {
                        $query = $query->whereNotIn('fosterFamilies.id', $subQuery);
                    } else {
                        $query = $query->orWhereNotIn('fosterFamilies.id', $subQuery);
                    }
                } else if (str_ends_with($val, 'dogs')) {
                    $subQuery = DB::table('fosterFamilies')->join('pets', 'fosterFamilies.id', '=', 'pets.fosterFamily_id')->select('fosterFamilies.id');
                    $subQuery =  $subQuery->where('pets.species', '=', 'Hond');
                    if ($first) {
                        $first = false;
                        $query = $query->whereNotIn('fosterFamilies.id', $subQuery);
                    } else if ($noOr) {
                        $query = $query->whereNotIn('fosterFamilies.id', $subQuery);
                    } else {
                        $query = $query->orWhereNotIn('fosterFamilies.id', $subQuery);
                    }
                } else if (str_ends_with($val, 'cats')) {
                    $subQuery = DB::table('fosterFamilies')->join('pets', 'fosterFamilies.id', '=', 'pets.fosterFamily_id')->select('fosterFamilies.id');
                    $subQuery = $subQuery->where('pets.species', '=', 'Kat');
                    if ($first) {
                        $first = false;
                        $query = $query->whereNotIn('fosterFamilies.id', $subQuery);

                    } else if ($noOr) {
                        $query = $query->whereNotIn('fosterFamilies.id', $subQuery);
                    } else {
                        $query = $query->orWhereNotIn('fosterFamilies.id', $subQuery);
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
        $result = json_decode(json_encode($result));
        foreach ($result as $row) {
            $row['hashed'] = Crypt::encryptString($row['id']);
        }
        return json_encode($result);
    }

    public function filterFosterFamilies(Request $request)
    {
        $data = $request->all();

        $fosterFamilies = DB::table('fosterFamilies')->leftJoin('foster_preferences', 'fosterFamilies.id', '=', 'foster_preferences.fosterFamily_id');
        //$fosterFamilies = $fosterFamilies->where('foster_preferences.adult', '=', 1);
        if (isset($data['availableSpots'])) {
            $fosterFamilies = $fosterFamilies->where('availableSpots', '=', $data['availableSpots']);
        }
        if (isset($data['livingStatus'])) {
            $fosterFamilies = FosterFamilyController::filterHomeSituation($data['livingStatus'], $fosterFamilies);
        }
        if (isset($data['catPreferences'])) {
            $fosterFamilies = FosterFamilyController::filterByCatPref($data['catPreferences'], $fosterFamilies);
        }
        $result = $fosterFamilies->get();
        $result = json_decode(json_encode($result), true);
        $final = [];
        foreach ($result as &$row) {
            $row['hashed'] = Crypt::encryptString($row['id']);
            CatController::getCatsByFosterId($row['id']);
            //$row[''];
        }
        //dd($result);
        return json_encode($result);
    }
}
