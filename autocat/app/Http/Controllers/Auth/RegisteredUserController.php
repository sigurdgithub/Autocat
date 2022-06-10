<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\FosterFamily;
use App\Models\Shelter;
use App\Models\User;
use App\Models\FosterPreference;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Http\Controllers\PetsAndRoommatesController;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function createFoster()
    {
        return view(('auth.fosterAccount'));
    }

    public function createShelter()
    {
        return view(('auth.shelterAccount'));
    }


    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeFoster(Request $request)
    {

        // FOSTERFAMILY TABLE //
        $request->validate([
            'lastName' => ['required', 'string'],
            'firstName' => ['required', 'string'],
            'dateOfBirth' => ['required', 'date'],
            'street' => ['required', 'string'],
            'number' => ['required', 'string'],
            'city' => ['required', 'string'],
            'zipCode' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'availableSpots' => ['required', 'integer'],
        ]);

        $foster = FosterFamily::firstOrCreate([
            'lastName' => $request->input('lastName'),
            'firstName' => $request->input('firstName'),
            'dateOfBirth' => $request->input('dateOfBirth'),
            'street' => $request->input('street'),
            'number' => $request->input('number'),
            'city' => $request->input('city'),
            'zipCode' => $request->input('zipCode'),
            'phone' => $request->input('phone'),
            'availableSpots' => $request->input('availableSpots'),
        ]);

        // USER TABLE //

        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', Rules\Password::defaults()],
            'fosterFamily_id' => 'integer',
            'shelter_id' => 'null'
        ]);

        $user = User::firstOrCreate([
            'email' => $request->input('email'),
            'password' => Hash::make($request->password),
            'fosterFamily_id' => $foster->id,
            'shelter_id' => null
        ]);

        // FOSTER_PREFERENCES TABLE //

        $request->validate([
            'fosterFamily_id' => ['integer'],
            'adult' => ['integer'],
            'pregnant' => ['integer'],
            'kitten' => ['integer'],
            'bottleFeeding' => ['integer'],
            'scared' => ['integer'],
            'feral' => ['integer'],
            'intensiveCare' => ['integer'],
            'noIntensiveCare' => ['integer'],
            'isolation' => ['integer']
        ]);

        $fosterPreference = FosterPreference::firstOrCreate([
            'fosterFamily_id' => $foster->id,
            'adult' => $request->input('adult'),
            'pregnant' => $request->input('pregnant'),
            'kitten' => $request->input('kitten'),
            'bottleFeeding' => $request->input('bottleFeeding'),
            'scared' => $request->input('scared'),
            'feral' => $request->input('feral'),
            'intensiveCare' => $request->input('intensiveCare'),
            'noIntensiveCare' => $request->input('noIntensiveCare'),
            'isolation' => $request->input('isolation'),
        ]);

        event(new Registered($user));

        Auth::login($user);

        $roommates = PetsAndRoommatesController::showRoommatesByFosterId($foster->id);
        //dd($roommates);
        $pets = PetsAndRoommatesController::showPetsByFosterId($foster->id);
        //dd($pets);
        $species = (['Kat','Hond','Knaagdier','Vogel']);
        $relation = (['Partner','Kind','Ouder']);

        return redirect()->route('fosterAccount', $foster->id);
    }

    public function updateFoster(Request $request, $user)
    {
        $fosterFamily = FosterFamily::find('id', '=', $user->fosterFamily_id);
        $fosterFamily->lastName = $request->input('lastName');
        $fosterFamily->firstName = $request->input('firstName');
        $fosterFamily->dateOfBirth = $request->input('dateOfBirth');
        $fosterFamily->street = $request->input('street');
        $fosterFamily->number = $request->input('number');
        $fosterFamily->city = $request->input('city');
        $fosterFamily->zipCode = $request->input('zipCode');
        $fosterFamily->phone = $request->input('phone');
        $fosterFamily->availableSpots = $request->input('availableSpots');
        $fosterFamily->save();

        $user = User::find(auth()->user()->id);
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();

        $fosterPreference = FosterPreference::find('fosterFamily_id', '=', $user->fosterFamily_id);
        $fosterPreference->adult = $request->input('adult');
        $fosterPreference->pregnant = $request->input('pregnant');
        $fosterPreference->kitten = $request->input('kitten');
        $fosterPreference->bottleFeeding = $request->input('bottleFeeding');
        $fosterPreference->feral = $request->input('feral');
        $fosterPreference->intensiveCare = $request->input('intensiveCare');
        $fosterPreference->noIntensiveCare = $request->input('noIntensiveCare');
        $fosterPreference->isolation = $request->input('isolation');
        $fosterPreference->save();

        return redirect()->route('pleeggezinAccount/{id}', ['id' => $fosterFamily->id]);
    }


    /*  public function showFosterById($id)
    {

        $fosterFamily = FosterFamily::where('id', $id)->firstOrFail();
        $fosterPreference = FosterPreference::where('fosterFamily_id', $id)->firstOrFail();
        $user = User::where('fosterFamily_id', $id);

        return view('pleeggezinAccount', compact('fosterFamily', 'fosterPreference', 'user'));

        /* // MASSIMO
        $user = User::find(auth()->user()->id);
        //dd($user->fosterFamily_id);
        $fosterFamilies = FosterFamily::where('id', '=', $user->fosterFamily_id)->firstOrFail();
        dd($fosterFamilies);
        return view('auth.fosterAccount', compact('fosterFamiliy', 'fosterPreference', 'user')); 
    } */

    public function storeShelter(Request $request)
    {

        // SHELTERS TABLE //
        $request->validate([
            'shelterName' => ['required', 'string'],
            'shelterPhone' => ['required', 'string'],
            'hkNumber' => ['required', 'string'],
            'shelterFirstName' => ['required', 'string'],
            'shelterLastName' => ['required', 'string'],
            'shelterDateOfBirth' => ['required', 'date'],
            'shelterStreet' => ['required', 'string'],
            'shelterNumber' => ['required', 'string'],
            'shelterCity' => ['required', 'string'],
            'shelterZipCode' => ['required', 'string'],
            'phoneNumber' => ['required', 'string'],
            'website' => ['required', 'string'],
            'picture' => ['nullable', 'string'],
        ]);

        $shelter = Shelter::create([
            'shelterName' => $request->shelterName,
            'shelterPhone' => $request->shelterPhone,
            'hkNumber' => $request->hkNumber,
            'shelterFirstName' => $request->shelterFirstName,
            'shelterLastName' => $request->shelterLastName,
            'shelterDateOfBirth' => $request->shelterDateOfBirth,
            'shelterStreet' => $request->shelterStreet,
            'shelterNumber' => $request->shelterNumber,
            'shelterCity' => $request->shelterCity,
            'shelterZipCode' => $request->shelterZipCode,
            'phoneNumber' => $request->phoneNumber,
            'website' => $request->website,
            'picture' => $request->picture,
        ]);

        // USER TABLE //
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', Rules\Password::defaults()],
            'fosterFamily_id' => 'null',
            'shelter_id' => ['integer']
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'fosterFamily_id' => null,
            'shelter_id' => $shelter->id
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::shelterHome);
    }
}
