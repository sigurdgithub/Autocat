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
        /* dd($request); */
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', Rules\Password::defaults()],
            'fosterFamily_id' => 'integer'
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'fosterFamily_id' => $foster->id
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

        FosterPreference::create([
            'fosterFamily_id' => $foster->id,
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
}
