<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cat;
use App\Models\CatPreference;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;


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

    public static function getCatAgeString($birthDate) {
        $carbonBirthDate = Carbon::parse($birthDate);
        $diffYears = $carbonBirthDate->DiffInYears(Carbon::now());
        $diffMonths = $carbonBirthDate->diffInMonths(Carbon::now());
        $diffWeeks = $carbonBirthDate->diffInWeeks(Carbon::now());
        if ($diffYears > 0) {
            return $diffYears.' jaar';
        } else if($diffMonths > 0) {
            return $diffMonths.(($diffMonths > 1) ?' maanden':' maand');
        } else {
            return $diffWeeks.(($diffWeeks > 1) ?' weken':' week');
        }
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
    public function getPreferenceByCatId($id) {
        //dd(Cat::findOrFail($id)->preferences);
        //dump(Cat::findOrFail($id)->preferences);
        return json_encode(Cat::findOrFail($id)->preferences);
        //return CatPreference::where('cat_id', $id)->firstOrFail();
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
        ]);

        $cats = Cat::all();
        $adoptionStatus = (['Aangemeld','Bij Pleeggezin','In Asiel','Klaar voor adoptie','In optie','Adoptie goedgekeurd','Bij Adoptiegezin']);
        $breed = (['Europees korthaar', 'Abessijn', 'Amerikaanse bobtail', 'American Curl', 'American wirehair', 'Amerikaans korthaar', 'Ashera', 'Asian', 'Australian Mist', 'Balinees', 'Bengaal', 'Blauwe Rus', 'Boheemse Rex', 'Bombay', 'Britse korthaar', 'Britse langhaar', 'Burmees', 'Burmilla', 'California Spangled', 'Ceylon', 'Chartreux', 'Cornish Rex', 'Cymric', 'Devon Rex', 'Don Sphynx', 'Dragon Li', 'Egyptische Mau', 'Exotic', 'German Rex', 'Havana Brown', 'Heilige Birmaan', 'Highlander', 'Japanse Bobtail', 'Kanaani', 'Khao Manee', 'Korat', 'Kurillen stompstaartkat', 'LaPerm', 'Lykoi', 'Maine Coon', 'Mandalay', 'Manx', 'Mekong bobtail', 'Munchkin', 'Nebelung', 'Neva Masquerade', 'Noorse boskat', 'Ocicat', 'Ojos Azules', 'Oosters korthaar', 'Oosters langhaar', 'Pers', 'Peterbald', 'Pixie-Bob', 'Ragamuffin', 'Ragdoll', 'Savannah', 'Scottish Fold', 'Selkirk Rex', 'Serengeti', 'Seychellois', 'Siamees', 'Siberische kat', 'Singapura', 'Snowshoe', 'Sokoke', 'Somali', 'Sphynx', 'Thai', 'Tibetaan', 'Tiffanie', 'Tonkanees', 'Turkse Angora', 'Turkse Van', 'Ural Rex', 'York Chocolate']);
        $furLength = (['Kort','Lang']);
        $gender = (['Kattin','Kater']);
        $socialization = (['Tam','Bang','Wild']);
        $reason = (['Vaccinatie','Chip','Vaccinatie & chip','Sterilisatie','']);
        $weighings = MedicalController::showWeigingsByCatId($cat->id);
        $vetVisits = MedicalController::showVetVisitsByCatId($cat->id);
        
        return view('catDetail', compact('cat', 'catPreference', 'cats','adoptionStatus','breed','furLength','gender','socialization','reason','weighings','vetVisits'));
    }

    public function showCatById($id)
    {
        $cat = Cat::where('id', $id)->firstOrFail();
        $catPreference = CatPreference::where('cat_id',$id)->firstOrFail();
        $cats = Cat::all();
        $adoptionStatus = (['Aangemeld','Bij Pleeggezin','In Asiel','Klaar voor adoptie','In optie','Adoptie goedgekeurd','Bij Adoptiegezin']);
        $breed = (['Europees korthaar', 'Abessijn', 'Amerikaanse bobtail', 'American Curl', 'American wirehair', 'Amerikaans korthaar', 'Ashera', 'Asian', 'Australian Mist', 'Balinees', 'Bengaal', 'Blauwe Rus', 'Boheemse Rex', 'Bombay', 'Britse korthaar', 'Britse langhaar', 'Burmees', 'Burmilla', 'California Spangled', 'Ceylon', 'Chartreux', 'Cornish Rex', 'Cymric', 'Devon Rex', 'Don Sphynx', 'Dragon Li', 'Egyptische Mau', 'Exotic', 'German Rex', 'Havana Brown', 'Heilige Birmaan', 'Highlander', 'Japanse Bobtail', 'Kanaani', 'Khao Manee', 'Korat', 'Kurillen stompstaartkat', 'LaPerm', 'Lykoi', 'Maine Coon', 'Mandalay', 'Manx', 'Mekong bobtail', 'Munchkin', 'Nebelung', 'Neva Masquerade', 'Noorse boskat', 'Ocicat', 'Ojos Azules', 'Oosters korthaar', 'Oosters langhaar', 'Pers', 'Peterbald', 'Pixie-Bob', 'Ragamuffin', 'Ragdoll', 'Savannah', 'Scottish Fold', 'Selkirk Rex', 'Serengeti', 'Seychellois', 'Siamees', 'Siberische kat', 'Singapura', 'Snowshoe', 'Sokoke', 'Somali', 'Sphynx', 'Thai', 'Tibetaan', 'Tiffanie', 'Tonkanees', 'Turkse Angora', 'Turkse Van', 'Ural Rex', 'York Chocolate']);
        $furLength = (['Kort','Lang']);
        $gender = (['Kattin','Kater']);
        $socialization = (['Tam','Bang','Wild']);
        $reason = (['Vaccinatie','Chip','Vaccinatie & chip','Sterilisatie','']);
        $weighings = MedicalController::showWeigingsByCatId($id);
        $vetVisits = MedicalController::showVetVisitsByCatId($id);

        return view('catDetail', compact('cat', 'catPreference', 'cats','adoptionStatus','breed','furLength','gender','socialization','reason','weighings','vetVisits'));
    }

}