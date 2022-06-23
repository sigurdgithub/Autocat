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
    // Get all fosterFamilies
    public static function getFosterFamilies()
    {
        $fosterFamilies = FosterFamily::all();
        return $fosterFamilies;
    }

    /**
     * Get the amount of cats that a fosterFamily is currently housing
     * @param integer $fosterFamilyId the id of the fosterFamily we are interested in
     * @return integer the amount of cats that the given fosterFamily is currently housing
     */
    public static function getAmountOfCats($fosterFamilyId)
    {
        $count =  Cat::where('fosterFamily_id', '=', $fosterFamilyId)
            ->where(function ($subQuery) {
                $subQuery->where('adoptionStatus', '=', 'Bij Pleeggezin')
                    ->orWhere('adoptionStatus', '=', 'Klaar voor adoptie')
                    ->orWhere('adoptionStatus', '=', 'In optie')
                    ->orWhere('adoptionStatus', '=', 'Adoptie goedgekeurd');
            });
        //dd($count->get());
        return $count->get()->count();
    }

    /**
     * Get the fosterFamily corresponding to a given cat
     * @param integer $catId the id of the cat of which we want to get the fosterFamily
     * @return FosterFamily the fosterFamily corresponding to the given cat
     */
    public static function getFosterFamiliesByCatId($catId)
    {
        $fosterFamilyId = Cat::find($catId)->fosterFamily_id;
        $fosterFamily = FosterFamily::find($fosterFamilyId);
        return $fosterFamily;
    }

    /**
     * Get a fosterFamily with the given id
     * @param integer $id the id of the requested fosterFamily
     * @return array an json-encoded array containing the requested fosterFamily along with the hashed id and the current available spots
     */
    public function getFosterFamilyById($id)
    {
        $result = FosterFamily::findOrFail($id);
        $result = json_decode(json_encode($result), true);
        $result['hashed'] = Crypt::encryptString($result['id']);
        $result['availableSpots'] = $result['availableSpots'] - FosterFamilyController::getAmountOfCats($id);
        return json_encode($result);
    }

    /**
     * Get all fosterPreferences of a FosterFamily
     * @param integer $id the id the FosterFamily that we want the preferences of
     * @return array a json-encoded array containing the preferences of the given fosterFamily along with their email, pets and roommates
     */
    public function getPreferenceByFosterId($id)
    {
        $result = [];
        $result['preferences'] = json_decode(json_encode(FosterFamily::findOrFail($id)->preferences));
        $result['pets'] = json_decode(json_encode(FosterFamily::findOrFail($id)->pets));
        $result['roommates'] = json_decode(json_encode(FosterFamily::findOrFail($id)->roommates));
        $result['email'] = User::where('fosterFamily_id', $id)->select('email')->first();
        return json_encode($result);
    }

    /**
     * Filter all fosterFamilies based on the given values for possible catPreferences
     * @param array $value an array of strings representing what catPreferences the fosterFamily should accept
     * @param QueryBuilder $query the query builder that we need to add aditional where clauses to based on the given values
     * @param bool $noOr an optional parameter indicating wether we want to AND instead of OR between our where clauses
     * @return QueryBuilder the given query builder appended by the where clauses for each given value
     */
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
                    } else {
                        $query = $query->orWhere('foster_preferences.kitten', 1);
                    }
                } else if (!strcmp($val, 'bottleFeeding')) {
                    if ($first) {
                        $first = false;
                        $query = $query->where('foster_preferences.bottleFeeding', 1);
                    } else if ($noOr) {
                        $query = $query->where('foster_preferences.bottleFeeding', 1);
                    } else {
                        $query = $query->orWhere('foster_preferences.bottleFeeding', 1);
                    }
                } else if (!strcmp($val, 'scared')) {
                    if ($first) {
                        $first = false;
                        $query = $query->where('foster_preferences.scared', 1);
                    } else if ($noOr) {
                        $query = $query->where('foster_preferences.scared', 1);
                    } else {
                        $query = $query->orWhere('foster_preferences.scared', 1);
                    }
                } else if (!strcmp($val, 'feral')) {
                    if ($first) {
                        $first = false;
                        $query = $query->where('foster_preferences.feral', 1);
                    } else if ($noOr) {
                        $query = $query->where('foster_preferences.feral', 1);
                    } else {
                        $query = $query->orWhere('foster_preferences.feral', 1);
                    }
                } else if (!strcmp($val, 'intensiveCare')) {
                    if ($first) {
                        $first = false;
                        $query = $query->where('foster_preferences.intensiveCare', 1);
                    } else if ($noOr) {
                        $query = $query->where('foster_preferences.intensiveCare', 1);
                    } else {
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
                    } else {
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

    /**
     * Filter all fosterFamilies based on the given values for their home situation
     * @param array $value an array of strings representing what home situations are NOT possible
     * @param QueryBuilder $query the query builder that we need to add aditional where clauses to based on the given values
     * @param bool $noOr an optional parameter indicating wether we want to AND instead of OR between our where clauses
     * @return QueryBuilder the given query builder appended by the where clauses for each given value
     */
    public static function filterHomeSituation($value, $query, $noOr = false)
    {
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

    /**
     * Filter all fosterFamilies based on their name
     * @param string $string the string that we try to find in the name of the fosterFamilies
     * @return array a json-encoded array filled with all fosterFamilies whose name includes the given string
     */
    public function filterFosterFamiliesByString($string)
    {
        $fosterFamilies = DB::table('fosterFamilies')->select('fosterFamilies.*');
        $fosterFamilies = $fosterFamilies->where('fosterFamilies.firstName', 'LIKE', '%' . $string . '%')
            ->orWhere('fosterFamilies.lastName', 'LIKE', '%' . $string . '%');
        $result = $fosterFamilies->get();
        $result = json_decode(json_encode($result), true);
        foreach ($result as $row) {
            $row['hashed'] = Crypt::encryptString($row['id']);
            $row['availableSpots'] -= FosterFamilyController::getAmountOfCats($row['id']);
        }
        return json_encode($result);
    }

    /**
     * Filter all fosterFamilies according to the selected parameters.
     * @param Request $request A POST-request object containing a possible parameter (which are arrays) for each filter option
     * @return array A json-encoded array containing all fosterFamilies that match the selected parameters, with the actual availableSpots and the hashed id
     */
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
            $row['availableSpots'] -= FosterFamilyController::getAmountOfCats($row['id']);
            //$row[''];
        }
        //dd($result);
        return json_encode($result);
    }
}
