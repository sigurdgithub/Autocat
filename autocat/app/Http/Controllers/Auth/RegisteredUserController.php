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
use Illuminate\Support\Facades\Crypt;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function createFoster()
    {
        return view('auth.fosterAccount');
    }

    public function createShelter()
    {
        return view('auth.shelterAccount');
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
            'password' => Hash::make($request->input('password')),
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
        $species = (['Kat', 'Hond', 'Knaagdier', 'Vogel']);
        $relation = (['Partner', 'Kind', 'Ouder']);

        $foster_id_crypt = Crypt::encryptString(auth()->user()->fosterFamily_id);

        return redirect()->route('notifications', $foster_id_crypt);
    }

    public function updateFoster(Request $request, $user)
    {
        //$fosterFamily = FosterFamily::find('id', '=', $user->fosterFamily_id);

        $id = $request->input('fosterFamily_id');
        $fosterFamily = FosterFamily::find($id);
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
        /* $user->password = ($request->input('password')); */
        $user->save();

        FosterPreference::where('fosterFamily_id', $id)->update([
            'adult' => $request->input('adult'),
            'pregnant' => $request->input('pregnant'),
            'kitten' => $request->input('kitten'),
            'bottleFeeding' => $request->input('bottleFeeding'),
            'feral' => $request->input('feral'),
            'intensiveCare' => $request->input('intensiveCare'),
            'noIntensiveCare' => $request->input('noIntensiveCare'),
            'isolation' => $request->input('isolation'),
        ]);

        $roommates = PetsAndRoommatesController::showRoommatesByFosterId($fosterFamily->id);
        //dd($roommates);
        $pets = PetsAndRoommatesController::showPetsByFosterId($fosterFamily->id);
        //dd($pets);
        $species = (['Kat', 'Hond', 'Knaagdier', 'Vogel']);
        $relation = (['Partner', 'Kind', 'Ouder']);
        $foster_id_crypt = Crypt::encryptString(auth()->user()->fosterFamily_id);

        return redirect()->route('fosterAccount', $foster_id_crypt);
    }

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

        $shelter = Shelter::firstOrCreate([
            'shelterName' => $request->input('shelterName'),
            'shelterPhone' => $request->input('shelterPhone'),
            'hkNumber' => $request->input('hkNumber'),
            'shelterFirstName' => $request->input('shelterFirstName'),
            'shelterLastName' => $request->input('shelterLastName'),
            'shelterDateOfBirth' => $request->input('shelterDateOfBirth'),
            'shelterStreet' => $request->input('shelterStreet'),
            'shelterNumber' => $request->input('shelterNumber'),
            'shelterCity' => $request->input('shelterCity'),
            'shelterZipCode' => $request->input('shelterZipCode'),
            'phoneNumber' => $request->input('phoneNumber'),
            'website' => $request->input('website'),
            'picture' => $request->input('picture'),
        ]);

        // USER TABLE //
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', Rules\Password::defaults()],
            'fosterFamily_id' => 'null',
            'shelter_id' => ['integer']
        ]);

        $user = User::firstOrCreate([
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'fosterFamily_id' => null,
            'shelter_id' => $shelter->id
        ]);

        event(new Registered($user));

        Auth::login($user);

        $shelter_id_crypt = Crypt::encryptString(auth()->user()->shelter_id);
        return redirect()->route('shelterNotifications', $shelter_id_crypt);
    }

    public function updateShelter(Request $request)
    {
        $id = $request->input('shelter_id');
        $shelter = Shelter::find($id);
        $shelter->shelterName = $request->input('shelterName');
        $shelter->shelterPhone = $request->input('shelterPhone');
        $shelter->hkNumber = $request->input('hkNumber');
        $shelter->shelterFirstName = $request->input('shelterFirstName');
        $shelter->shelterLastName = $request->input('shelterLastName');
        $shelter->shelterDateOfBirth = $request->input('shelterDateOfBirth');
        $shelter->shelterStreet = $request->input('shelterStreet');
        $shelter->shelterNumber = $request->input('shelterNumber');
        $shelter->shelterCity = $request->input('shelterCity');
        $shelter->shelterZipCode = $request->input('shelterZipCode');
        $shelter->phoneNumber = $request->input('phoneNumber');
        $shelter->website = $request->input('website');
        $shelter->picture = $request->input('picture');
        $shelter->save();

        $user = User::find(auth()->user()->id);
        $user->email = $request->input('email');
        $user->password = ($request->input('password'));
        $user->save();
        $shelter_id_crypt = Crypt::encryptString(auth()->user()->shelter_id);

        return redirect()->route('shelterAccount', $shelter_id_crypt);
    }
}
