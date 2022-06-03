<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\FosterFamily;
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
    public function create()
    {
        return view(('auth.fosterAccount'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // USER TABLE //
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', Rules\Password::defaults()],
            'fosterFamily_id' => ['foreignId']
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            /* 'fosterFamily_id' => $request->fosterFamily_id */
        ]);



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

        FosterFamily::create([
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

        // FOSTER_PREFERENCES TABLE //
        //dd($request);
        $request->validate([
            /* 'fosterFamily_id' => ['foreignId'], */
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

        FosterPreference::create([
            'adult' => $request->adult,
            'pregnant' => $request->pregnant,
            'kitten' => $request->kitten,
            'bottleFeeding' => $request->noIntensiveCare,
            'scared' => $request->scared,
            'feral' => $request->feral,
            'intensiveCare' => $request->intensiveCare,
            'noIntensiveCare' => $request->noIntensiveCare,
            'isolation' => $request->isolation,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::fosterHome);
    }

    /*  public function storeFoster(Request $request)
    {
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

        FosterFamily::create([
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

        $request->validate([
            'fosterFamily_id' => ['foreignId'],
            'adult' => ['boolean'],
            'pregnant' => ['boolean'],
            'kitten' => ['boolean'],
            'bottleFeeding' => ['boolean'],
            'scared' => ['boolean'],
            'feral' => ['boolean'],
            'intensiveCare' => ['boolean'],
            'noIntensiveCare' => ['boolean'],
            'isolation' => ['boolean'],
        ]);

        FosterPreference::create([
            'adult' => $request->adult,
            'pregnant' => $request->pregnant,
            'kitten' => $request->kitten,
            'bottleFeeding' => $request->noIntensiveCare,
            'scared' => $request->scared,
            'feral' => $request->feral,
            'intensiveCare' => $request->intensiveCare,
            'noIntensiveCare' => $request->noIntensiveCare,
            'isolation' => $request->isolation,
        ]);
    }

    public function storeFosterPreference(Request $request)
    {
        $request->validate([
            'fosterFamily_id' => ['foreignId'],
            'adult' => ['boolean'],
            'pregnant' => ['boolean'],
            'kitten' => ['boolean'],
            'bottleFeeding' => ['boolean'],
            'scared' => ['boolean'],
            'feral' => ['boolean'],
            'intensiveCare' => ['boolean'],
            'noIntensiveCare' => ['boolean'],
            'isolation' => ['boolean'],
        ]);

        FosterPreference::create([
            'adult' => $request->adult,
            'pregnant' => $request->pregnant,
            'kitten' => $request->kitten,
            'bottleFeeding' => $request->noIntensiveCare,
            'scared' => $request->scared,
            'feral' => $request->feral,
            'intensiveCare' => $request->intensiveCare,
            'noIntensiveCare' => $request->noIntensiveCare,
            'isolation' => $request->isolation,
        ]);
    } */
}
