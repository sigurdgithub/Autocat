<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();
        //dd($request);
        $request->session()->regenerate();
        // Route to correct dashboard if shelter or foster
        if ($id = auth()->user()->fosterFamily_id) {
            return redirect()->route('notifications', $id);
        } elseif ($id = auth()->user()->shelter_id) {
            return redirect()->route('shelterNotifications', $id);
        };
    }


    // If fosterFamilt_id is null redirect to shelter dashboard 
    /*   $input = $request->all();

        (auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])));
        if (auth()->user()->fosterFamily_id != null) {
            return redirect()->route('/pleeggezinDashboard');
        } elseif (auth()->user()->fosterFamily_id == null) {
            return redirect()->route(RouteServiceProvider::shelterHome);
        } else {
            return redirect()->route('login')
                ->with('error', 'Email-Address And Password Are Wrong.');
        }
    } */


    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
