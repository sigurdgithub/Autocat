<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\FosterFamily;
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
        return view('auth.register');
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
        $request->validate([
            // Breeze registration
            /* 'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()], */
            // Autocat registration
            'lastName' => ['required', 'string', 'max:255'],
            'firstName' => ['required', 'string', 'max:255'],
            'dateOfBirth' => ['required', 'string', 'max:255'],
            'street' => ['required', 'string', 'max:255'],
            'number' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'zipCode' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'zipCode' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required',   Rules\Password::defaults()],
            'availableSpots' => ['required', 'string'],
            'preferences' => ['required'],
            /* '
             'picture' => ['required', 'string'] */

        ]);

        $fosterFamily = FosterFamily::create([
            // Breeze registration
            /* 'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), */
            // Autocat registration
            'lastName' => $request->lastName,
            'firstName' => $request->firstName,
            'dateOfBirth' => $request->dateOfBirth,
            'street' => $request->street,
            'number' => $request->number,
            'city' => $request->city,
            'zipCode' => $request->zipCode,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'availableSpots' => $request->availableSpots,
            'preferences' => $request->preferences
        ]);
        /* dd($request->all()); */
        event(new Registered($fosterFamily));


        Auth::login($fosterFamily);

        return redirect(RouteServiceProvider::fosterHome);
    }
}
