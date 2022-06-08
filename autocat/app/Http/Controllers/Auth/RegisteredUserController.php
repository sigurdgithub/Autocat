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

        $foster = FosterFamily::create([
            'lastName' => $request->lastName,
            'firstName' => $request->firstName,
            'dateOfBirth' => $request->dateOfBirth,
            'street' => $request->street,
            'number' => $request->number,
            'city' => $request->city,
            'zipCode' => $request->zipCode,
            'phone' => $request->phone,
            'availableSpots' => $request->availableSpots,
        ]);

        // USER TABLE //

        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', Rules\Password::defaults()],
            'fosterFamily_id' => 'integer',
            'shelter_id' => 'null'
        ]);

        $user = User::create([
            'email' => $request->email,
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

        $fosterPreference = FosterPreference::create([
            'fosterFamily_id' => $foster->id,
            'adult' => $request->adult,
            'pregnant' => $request->pregnant,
            'kitten' => $request->kitten,
            'bottleFeeding' => $request->bottleFeeding,
            'scared' => $request->scared,
            'feral' => $request->feral,
            'intensiveCare' => $request->intensiveCare,
            'noIntensiveCare' => $request->noIntensiveCare,
            'isolation' => $request->isolation,
        ]);

        event(new Registered($user));

        Auth::login($user);

        $species = (['Kat','Hond','Knaagdier','Vogel']);
        $relations = (['Kat','Hond','Knaagdier','Vogel']);
        return redirect(RouteServiceProvider::fosterHome);
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
