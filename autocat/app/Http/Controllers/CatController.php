<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cat;
use App\Models\CatPreference;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;

class CatController extends Controller
{
    public static function getCatsByFosterId($fosterId)
    {
        $matchCase = ['fosterFamily_id' => $fosterId];
        $cats = Cat::where($matchCase)->get();
        //$notifications = Notification::all();

        //dd($cats);
        return $cats;
        //return view('fosterDashboard', ['cats' => $cats]);

    }

    public static function getCatAgeString($birthDate)
    {
        $carbonBirthDate = Carbon::parse($birthDate);
        $diffYears = $carbonBirthDate->DiffInYears(Carbon::now());
        $diffMonths = $carbonBirthDate->diffInMonths(Carbon::now());
        $diffWeeks = $carbonBirthDate->diffInWeeks(Carbon::now());
        if ($diffYears > 0) {
            return $diffYears . ' jaar';
        } else if ($diffMonths > 0) {
            return $diffMonths . (($diffMonths > 1) ? ' maanden' : ' maand');
        } else {
            return $diffWeeks . (($diffWeeks > 1) ? ' weken' : ' week');
        }
    }


    public static function getCatsByFosterIdModal($fosterId)
    {
        $matchCase = ['fosterFamily_id' => $fosterId];
        $cats = Cat::select('id', 'name')->where($matchCase)->get();
        //$notifications = Notification::all();

        //dd($cats);
        return $cats;
        //return view('fosterDashboard', ['cats' => $cats]);

    }

    public function filterCatsByString($string) 
    {
        $cats = DB::table('cats')->select('cats.*')->leftJoin('fosterFamilies', 'cats.fosterFamily_id', '=', 'fosterFamilies.id');
        $cats = $cats->where('cats.name', 'LIKE', '%'.$string.'%');
        $result = $cats->addSelect('fosterFamilies.dateOfBirth AS fosterBirth')->addSelect('fosterFamilies.firstName AS fosterFirstName')->addSelect('fosterFamilies.lastName AS fosterLastName')->get();
        $array = json_decode(json_encode($result), true);
        $result = [];
        foreach ($array as $row) {
            //dd($row);
            $row += ['stringDate' => CatController::getCatAgeString($row['dateOfBirth'])];
            array_push($result, $row);
        }
        return json_encode($result);
    }

    public static function getCats()
    {
        $cats = Cat::all();
        return $cats;
    }

    private static function filterPlacement($value, $query)
    {
        if (is_array($value)) {
            $first = true;
            foreach ($value as $val) {
                if (str_starts_with($val, 'Solo')) {
                    if ($first) {
                        $first = false;
                        $query = $query->where('Solo', explode(' ', $val)[1]);
                    } else {
                        $query = $query->orWhere('Solo', explode(' ', $val)[1]);
                    }
                } else if (str_starts_with($val, 'Huisdier')) {
                    if ($first) {
                        $first = false;
                        $query = $query->where('withPet', explode(' ', $val)[1]);
                    } else {
                        $query = $query->orWhere('withPet', explode(' ', $val)[1]);
                    }
                } else if (str_starts_with($val, 'Tuin')) {
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

    private static function filterCharacter($value, $query)
    {
        if (is_array($value)) {
            $query->where(function ($query) use ($value) {
                $first = true;
                foreach ($value as $val) {
                    switch ($val) {
                        case 'playfulCat':
                            if ($first) {
                                $first = false;
                                $query = $query->where('catPreferences.playfulCat', 1);
                            } else {
                                $query = $query->orWhere('catPreferences.playfulCat', 1);
                            }
                            break;
                        case 'lapCat':
                            if ($first) {
                                $first = false;
                                $query = $query->where('catPreferences.lapCat', 1);
                            } else {
                                $query = $query->orWhere('catPreferences.lapCat', 1);
                            }
                            break;
                        case 'outdoorCat';
                            //dd("play");
                            if ($first) {
                                $first = false;
                                $query = $query->where('catPreferences.outdoorCat', 1);
                            } else {
                                $query = $query->orWhere('catPreferences.outdoorCat', 1);
                            }
                            break;
                        case 'calmCat':
                            if ($first) {
                                $first = false;
                                $query = $query->where('catPreferences.calmCat', 1);
                            } else {
                                $query = $query->orWhere('catPreferences.calmCat', 1);
                            }
                            break;
                        case 'bedroomAccess':
                            if ($first) {
                                $first = false;
                                $query = $query->where('catPreferences.bedroomAccess', 1);
                            } else {
                                $query = $query->orWhere('catPreferences.bedroomAccess', 1);
                            }
                            break;
                    }
                }
            });
            return $query;
        } else {
            switch ($value) {
                case 'playfulCat':
                    return $query->where('catPreferences.playfulCat', 1);
                case 'lapCat':
                    return $query->where('catPreferences.lapCat', 1);
                case 'outdoorCat':
                    return $query->where('catPreferences.outdoorCat', 1);
                case 'calmCat':
                    return $query->where('catPreferences.calmCat', 1);
                case 'bedroomAccess':
                    return $query->where('catPreferences.bedroomAccess', 1);
            }
        }
    }
    private static function filterAge($value, $query)
    {
        if (is_array($value)) {
            $first = true;
            foreach ($value as $val) {
                switch ($val) {
                    case 'kitten':
                        if ($first) {
                            $first = false;
                            $query = $query->whereDate('cats.dateOfBirth', '>=', Carbon::now()->subYear()->toDateString());
                        } else {
                            $query = $query->orWhereDate('cats.dateOfBirth', '>=', Carbon::now()->subYear()->toDateString());
                        }
                        break;
                    case 'adolescent':
                        if ($first) {
                            $first = false;
                            $query = $query->whereBetween('cats.dateOfBirth', [Carbon::now()->subYears(2)->toDateString(), Carbon::now()->subYear()->toDateString()]);
                        } else {
                            $query = $query->orWhereBetween('cats.dateOfBirth', [Carbon::now()->subYears(2)->toDateString(), Carbon::now()->subYear()->toDateString()]);
                        }
                        break;
                    case 'adult':
                        if ($first) {
                            $first = false;
                            $query = $query->whereBetween('cats.dateOfBirth', [Carbon::now()->subYears(8)->toDateString(), Carbon::now()->subYear(2)->toDateString()]);
                        } else {
                            $query = $query->orWhereBetween('cats.dateOfBirth', [Carbon::now()->subYears(8)->toDateString(), Carbon::now()->subYear(2)->toDateString()]);
                        }
                        break;
                    case 'senior':
                        if ($first) {
                            $first = false;
                            $query = $query->whereDate('cats.dateOfBirth', '<', Carbon::now()->subYears(8)->toDateString());
                        } else {
                            $query = $query->orWhereDate('cats.dateOfBirth', '<', Carbon::now()->subYears(8)->toDateString());
                        }
                        break;
                }
            }
            return $query;
        } else {
            switch ($value) {
                case 'kitten':
                    $query = $query->whereDate('cats.dateOfBirth', '<=', Carbon::now()->subYear()->toDateString());
                    return $query;
                case 'adolescent':
                    $query = $query->whereBetween('cats.dateOfBirth', [Carbon::now()->subYears(2)->toDateString(), Carbon::now()->subYear()->toDateString()]);
                    return $query;
                case 'adult':
                    $query = $query->whereBetween('cats.dateOfBirth', [Carbon::now()->subYears(8)->toDateString(), Carbon::now()->subYear(2)->toDateString(),]);
                    return $query;
                case 'senior':
                    $query = $query->whereDate('cats.dateOfBirth', '>', Carbon::now()->subYears(8)->toDateString());
                    return $query;
            }
        }
    }

    private static function basicFilter($value, $query, $columnName)
    {
        if (!isset($value)) {
            return $query;
        }
        if (is_array($value)) {
            $first = true;
            foreach ($value as $val) {
                if ($first) {
                    $first  = false;
                    $query = $query->where($columnName, $val);
                } else {
                    $query = $query->orWhere($columnName, $val);
                }
            }
        } else {
            $query = $query->where($columnName, $value);
        }
        return $query;
    }

    public function filterCats(Request $request)
    {
        /*$validation = $request->validate([
            'status'      => 'required',
            'email'     => 'required',
            'mobile'    => 'required',
            'message'   => 'required',
          ]);*/
        $data = $request->all();
        $cats = DB::table('cats')->select('cats.*')->join('catPreferences', 'cats.id', '=', 'catPreferences.cat_id')->leftJoin('fosterFamilies', 'cats.fosterFamily_id', '=', 'fosterFamilies.id');
        // Filter 
        //dd($data);
        if (isset($data['character'])) {
            $cats = CatController::filterCharacter($data['character'], $cats);
        }
        if (isset($data['gender'])) {
            $cats = CatController::basicFilter($data['gender'], $cats, 'gender');
        }
        if (isset($data['status'])) {
            $cats = CatController::basicFilter($data['status'], $cats, 'adoptionStatus');
        }
        if (isset($data['fosterFamily'])) {
            $cats = CatController::basicFilter($data['fosterFamily'], $cats, 'fosterFamily_id');
        }

        if (isset($data['placement'])) {
            $cats = CatController::filterPlacement($data['placement'], $cats);
        }
        if (isset($data['age'])) {
            $cats = CatController::filterAge($data['age'], $cats);
        }
        //dd($cats->toSql());

        // Use a join to include all the needed fields that are filtered on

        $result = $cats->addSelect('fosterFamilies.dateOfBirth AS fosterBirth')->addSelect('fosterFamilies.firstName AS fosterFirstName')->addSelect('fosterFamilies.lastName AS fosterLastName')->get();
        $array = json_decode(json_encode($result), true);
        $result = [];
        foreach ($array as $row) {
            //dd($row);
            $row += ['stringDate' => CatController::getCatAgeString($row['dateOfBirth'])];
            if (isset($row['fosterFamily_id'])) {
                $row += ['fosterHashed' => Crypt::encryptString($row['fosterFamily_id'])];
            }
            array_push($result, $row);
        }
        return json_encode($result);
    }

    public function getCatById($id)
    {
        return Cat::findOrFail($id);
    }

    public function showEmptyCat()
    {
        $cats = CatController::getCats();
        $adoptionStatus = (['Aangemeld', 'Bij Pleeggezin', 'In Asiel', 'Klaar voor adoptie', 'In optie', 'Adoptie goedgekeurd', 'Bij Adoptiegezin']);
        $breed = (['Europees korthaar', 'Abessijn', 'Amerikaanse bobtail', 'American Curl', 'American wirehair', 'Amerikaans korthaar', 'Ashera', 'Asian', 'Australian Mist', 'Balinees', 'Bengaal', 'Blauwe Rus', 'Boheemse Rex', 'Bombay', 'Britse korthaar', 'Britse langhaar', 'Burmees', 'Burmilla', 'California Spangled', 'Ceylon', 'Chartreux', 'Cornish Rex', 'Cymric', 'Devon Rex', 'Don Sphynx', 'Dragon Li', 'Egyptische Mau', 'Exotic', 'German Rex', 'Havana Brown', 'Heilige Birmaan', 'Highlander', 'Japanse Bobtail', 'Kanaani', 'Khao Manee', 'Korat', 'Kurillen stompstaartkat', 'LaPerm', 'Lykoi', 'Maine Coon', 'Mandalay', 'Manx', 'Mekong bobtail', 'Munchkin', 'Nebelung', 'Neva Masquerade', 'Noorse boskat', 'Ocicat', 'Ojos Azules', 'Oosters korthaar', 'Oosters langhaar', 'Pers', 'Peterbald', 'Pixie-Bob', 'Ragamuffin', 'Ragdoll', 'Savannah', 'Scottish Fold', 'Selkirk Rex', 'Serengeti', 'Seychellois', 'Siamees', 'Siberische kat', 'Singapura', 'Snowshoe', 'Sokoke', 'Somali', 'Sphynx', 'Thai', 'Tibetaan', 'Tiffanie', 'Tonkanees', 'Turkse Angora', 'Turkse Van', 'Ural Rex', 'York Chocolate']);
        $furLength = (['Kort', 'Lang']);
        $gender = (['Kattin', 'Kater']);
        $socialization = (['Tam', 'Bang', 'Wild']);
        $reason = (['Vaccinatie', 'Chip', 'Vaccinatie & chip', 'Sterilisatie', 'Algemene checkup', 'Andere']);
        $fosterFamilies = FosterFamilyController::getFosterFamilies();

        return view('catDetail', compact('cats', 'adoptionStatus', 'breed', 'furLength', 'gender', 'socialization', 'fosterFamilies'));
    }

    public function getPreferenceByCatId($id)
    {
        //dd(Cat::findOrFail($id)->preferences);
        //dump(Cat::findOrFail($id)->preferences);
        return json_encode(Cat::findOrFail($id)->preferences);
        //return CatPreference::where('cat_id', $id)->firstOrFail();
    }

    public function storeCat(Request $request)
    {
        // Validate the request
        $validation = $request->validate([
            'name' => 'required',
            'adoptionStatus' => 'required'
        ]);

        $timestamp = now()->timestamp;

        //Get fosterFamilies
        $foster = (($request->input('fosterFamily_id')==0)?NULL:$request->input('fosterFamily_id'));

        // Store
        $cat = Cat::firstOrCreate(
            [
            'breed' => $request->input('breed'),    
            'gender' => $request->input('gender'),
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
            'image' => $request->input('image'),
            'fosterFamily_id' => $foster
            ]);
        
        //Link catPreferences to cat
        $catPreference = CatPreference::firstOrCreate(
            [
                'cat_id' => $cat->id,
                'bottleFeeding' => $request->input('bottleFeeding'),
                'pregnancy' => $request->input('pregnancy'),
                'intensiveCare' => $request->input('intensiveCare'),
                'noIntensiveCare' => $request->input('noIntensiveCare'),
                'isolation' => $request->input('isolation'),
                'kids' => $request->input('kids'),
                'dogs' => $request->input('dogs'),
                'cats' => $request->input('cats'),
                'lapCat' => $request->input('lapCat'),
                'playfulCat' => $request->input('playfulCat'),
                'outdoorCat' => $request->input('outdoorCat'),
                'calmCat' => $request->input('calmCat'),
                'bedroomAccess' => $request->input('bedroomAccess')
            ]
        );

        //Get all cats to fill buddy dropdown
        $cats = Cat::all();
        //Dropdown Content
        $adoptionStatus = (['Aangemeld', 'Bij Pleeggezin', 'In Asiel', 'Klaar voor adoptie', 'In optie', 'Adoptie goedgekeurd', 'Bij Adoptiegezin']);
        $breed = (['Europees korthaar', 'Abessijn', 'Amerikaanse bobtail', 'American Curl', 'American wirehair', 'Amerikaans korthaar', 'Ashera', 'Asian', 'Australian Mist', 'Balinees', 'Bengaal', 'Blauwe Rus', 'Boheemse Rex', 'Bombay', 'Britse korthaar', 'Britse langhaar', 'Burmees', 'Burmilla', 'California Spangled', 'Ceylon', 'Chartreux', 'Cornish Rex', 'Cymric', 'Devon Rex', 'Don Sphynx', 'Dragon Li', 'Egyptische Mau', 'Exotic', 'German Rex', 'Havana Brown', 'Heilige Birmaan', 'Highlander', 'Japanse Bobtail', 'Kanaani', 'Khao Manee', 'Korat', 'Kurillen stompstaartkat', 'LaPerm', 'Lykoi', 'Maine Coon', 'Mandalay', 'Manx', 'Mekong bobtail', 'Munchkin', 'Nebelung', 'Neva Masquerade', 'Noorse boskat', 'Ocicat', 'Ojos Azules', 'Oosters korthaar', 'Oosters langhaar', 'Pers', 'Peterbald', 'Pixie-Bob', 'Ragamuffin', 'Ragdoll', 'Savannah', 'Scottish Fold', 'Selkirk Rex', 'Serengeti', 'Seychellois', 'Siamees', 'Siberische kat', 'Singapura', 'Snowshoe', 'Sokoke', 'Somali', 'Sphynx', 'Thai', 'Tibetaan', 'Tiffanie', 'Tonkanees', 'Turkse Angora', 'Turkse Van', 'Ural Rex', 'York Chocolate']);
        $furLength = (['Kort', 'Lang']);
        $gender = (['Kattin', 'Kater']);
        $socialization = (['Tam', 'Bang', 'Wild']);
        $reason = (['Vaccinatie', 'Chip', 'Vaccinatie & chip', 'Sterilisatie', 'Algemene checkup', 'Andere']);
        //Get Weighings, vetVisits & fosterFamilies
        $weighings = MedicalController::showWeighingsByCatId($cat->id);
        $vetVisits = MedicalController::showVetVisitsByCatId($cat->id);
        $fosterFamilies = FosterFamilyController::getFosterFamilies();
        
        //Show cat by Id allowing immediate updating
        return redirect()->route('showCatById', ['id' => $cat->id]);

    }

    public function showCatById($id)
    {
        //Get cat & catpreferences by CatId
        $cat = Cat::where('id', $id)->firstOrFail();
        $catPreference = CatPreference::where('cat_id', $id)->firstOrFail();
        //Get all cats to fill buddy dropdown
        $cats = Cat::all();
        //Dropdown Content
        $adoptionStatus = (['Aangemeld', 'Bij Pleeggezin', 'In Asiel', 'Klaar voor adoptie', 'In optie', 'Adoptie goedgekeurd', 'Bij Adoptiegezin']);
        $breed = (['Europees korthaar', 'Abessijn', 'Amerikaanse bobtail', 'American Curl', 'American wirehair', 'Amerikaans korthaar', 'Ashera', 'Asian', 'Australian Mist', 'Balinees', 'Bengaal', 'Blauwe Rus', 'Boheemse Rex', 'Bombay', 'Britse korthaar', 'Britse langhaar', 'Burmees', 'Burmilla', 'California Spangled', 'Ceylon', 'Chartreux', 'Cornish Rex', 'Cymric', 'Devon Rex', 'Don Sphynx', 'Dragon Li', 'Egyptische Mau', 'Exotic', 'German Rex', 'Havana Brown', 'Heilige Birmaan', 'Highlander', 'Japanse Bobtail', 'Kanaani', 'Khao Manee', 'Korat', 'Kurillen stompstaartkat', 'LaPerm', 'Lykoi', 'Maine Coon', 'Mandalay', 'Manx', 'Mekong bobtail', 'Munchkin', 'Nebelung', 'Neva Masquerade', 'Noorse boskat', 'Ocicat', 'Ojos Azules', 'Oosters korthaar', 'Oosters langhaar', 'Pers', 'Peterbald', 'Pixie-Bob', 'Ragamuffin', 'Ragdoll', 'Savannah', 'Scottish Fold', 'Selkirk Rex', 'Serengeti', 'Seychellois', 'Siamees', 'Siberische kat', 'Singapura', 'Snowshoe', 'Sokoke', 'Somali', 'Sphynx', 'Thai', 'Tibetaan', 'Tiffanie', 'Tonkanees', 'Turkse Angora', 'Turkse Van', 'Ural Rex', 'York Chocolate']);
        $furLength = (['Kort', 'Lang']);
        $gender = (['Kattin', 'Kater']);
        $socialization = (['Tam', 'Bang', 'Wild']);
        $reason = (['Vaccinatie', 'Chip', 'Vaccinatie & chip', 'Sterilisatie', 'Algemene checkup', 'Andere']);
        //Get Weighings, vetVisits & fosterFamilies
        $weighings = MedicalController::showWeighingsByCatId($id);
        $vetVisits = MedicalController::showVetVisitsByCatId($id);
        $fosterFamilies = FosterFamilyController::getFosterFamilies();

        return view('catDetail', compact('cat', 'catPreference', 'cats', 'adoptionStatus', 'breed', 'furLength', 'gender', 'socialization', 'reason', 'weighings', 'vetVisits', 'fosterFamilies'));
    }

    public function updateCat(Request $request, $id) 
    {   
        //Find cat by Id
        $cat = Cat::find($id);
        //Update all catDetail fields
        $cat->breed = $request->input('breed');
        $cat->gender = $request->input('gender');
        $cat->name = $request->input('name');
        $cat->dateOfBirth = $request->input('dateOfBirth');
        $cat->furColor = $request->input('furColor');
        $cat->furLength = $request->input('furLength');
        $cat->chipNumber = $request->input('chipNumber');
        $cat->adoptionStatus = $request->input('adoptionStatus');
        $cat->notifierName = $request->input('notifierName');
        $cat->notifierPhone = $request->input('notifierPhone');
        $cat->socialization = $request->input('socialization');
        $cat->startWeight = $request->input('startWeight');
        $cat->sterilized = $request->input('sterilized');
        $cat->extraInfo = $request->input('extraInfo');
        $cat->medication = $request->input('medication');
        $cat->personality = $request->input('personality');
        $cat->solo = $request->input('solo');
        $cat->withPet = $request->input('withPet');
        $cat->gardenAccess = $request->input('gardenAccess');
        $cat->buddyId = $request->input('buddyId');
        $cat->image = $request->input('image');
        $cat->fosterFamily_id = $request->input('fosterFamily_id');
        $cat->save();

        //Update all catPreferences fields
        /* $catPreference = CatPreference::find($cat->id);*/        
        $catPreference = CatPreference::where('cat_id','=',$cat->id)->firstOrFail();
        //dd($cat->id);
        //dd($catPreference);
        $catPreference->bottleFeeding = $request->input('bottleFeeding');
        $catPreference->pregnancy = $request->input('pregnancy');
        $catPreference->intensiveCare = $request->input('intensiveCare');
        $catPreference->noIntensiveCare = $request->input('noIntensiveCare');
        $catPreference->isolation = $request->input('isolation');
        $catPreference->kids = $request->input('kids');
        $catPreference->dogs = $request->input('dogs');
        $catPreference->cats = $request->input('cats');
        $catPreference->lapCat = $request->input('lapCat');
        $catPreference->playfulCat = $request->input('playfulCat');
        $catPreference->outdoorCat = $request->input('outdoorCat');
        $catPreference->calmCat = $request->input('calmCat');
        $catPreference->bedroomAccess = $request->input('bedroomAccess'); 
        $catPreference->save();

        //Get all cats to fill buddy dropdown
        $cats = Cat::all();
        //Dropdown Content
        $adoptionStatus = (['Aangemeld','Bij Pleeggezin','In Asiel','Klaar voor adoptie','In optie','Adoptie goedgekeurd','Bij Adoptiegezin']);
        $breed = (['Europees korthaar', 'Abessijn', 'Amerikaanse bobtail', 'American Curl', 'American wirehair', 'Amerikaans korthaar', 'Ashera', 'Asian', 'Australian Mist', 'Balinees', 'Bengaal', 'Blauwe Rus', 'Boheemse Rex', 'Bombay', 'Britse korthaar', 'Britse langhaar', 'Burmees', 'Burmilla', 'California Spangled', 'Ceylon', 'Chartreux', 'Cornish Rex', 'Cymric', 'Devon Rex', 'Don Sphynx', 'Dragon Li', 'Egyptische Mau', 'Exotic', 'German Rex', 'Havana Brown', 'Heilige Birmaan', 'Highlander', 'Japanse Bobtail', 'Kanaani', 'Khao Manee', 'Korat', 'Kurillen stompstaartkat', 'LaPerm', 'Lykoi', 'Maine Coon', 'Mandalay', 'Manx', 'Mekong bobtail', 'Munchkin', 'Nebelung', 'Neva Masquerade', 'Noorse boskat', 'Ocicat', 'Ojos Azules', 'Oosters korthaar', 'Oosters langhaar', 'Pers', 'Peterbald', 'Pixie-Bob', 'Ragamuffin', 'Ragdoll', 'Savannah', 'Scottish Fold', 'Selkirk Rex', 'Serengeti', 'Seychellois', 'Siamees', 'Siberische kat', 'Singapura', 'Snowshoe', 'Sokoke', 'Somali', 'Sphynx', 'Thai', 'Tibetaan', 'Tiffanie', 'Tonkanees', 'Turkse Angora', 'Turkse Van', 'Ural Rex', 'York Chocolate']);
        $furLength = (['Kort','Lang']);
        $gender = (['Kattin','Kater']);
        $socialization = (['Tam','Bang','Wild']);
        $reason = (['Vaccinatie','Chip','Vaccinatie & chip','Sterilisatie', 'Algemene checkup', 'Andere']);
        //Get Weighings, vetVisits & fosterFamilies
        $weighings = MedicalController::showWeighingsByCatId($id);
        $vetVisits = MedicalController::showVetVisitsByCatId($id);
        $fosterFamilies = FosterFamilyController::getFosterFamilies();

        //Show cat by Id allowing immediate updating
        return redirect()->route('showCatById', ['id' => $cat->id]);
    }
    public function showByFosterId($fosterId)
    {
        $foster = Auth::user()->fosterFamily_id;
        $cats = CatController::getCatsByFosterId($foster);
        return view('fosterCats', ['cats' => $cats, 'fosterFamily' => $foster]);
    }
}
