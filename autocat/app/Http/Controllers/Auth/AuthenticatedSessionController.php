<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PetsAndRoommatesController;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use App\Models\FosterFamily;
use App\Models\FosterPreference;
use App\Models\Shelter;

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
        $request->session()->regenerate();
        // Route to correct dashboard if shelter or foster
        if ($foster_id_crypt = auth()->user()->fosterFamily_id) {
            $foster_id_crypt = Crypt::encryptString(auth()->user()->fosterFamily_id);
            return redirect()->route('welcome', $foster_id_crypt); //['fosterId' => $request->fosterFamily]);
        } elseif ($shelter_id_crypt = auth()->user()->shelter_id) {
            $shelter_id_crypt = Crypt::encryptString(auth()->user()->shelter_id);
            return redirect()->route('welcome', $shelter_id_crypt);
        };
    }

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

    // Route to fosterAccount
    public function getFosterAccount($id)
    {
        // Decrypt ID & show fosterfamily details
        $fosterFamilyDecryptID = Crypt::decryptString($id);
        $user = User::find(auth()->user()->id);
        $fosterFamily = FosterFamily::where('id', '=', $fosterFamilyDecryptID)->firstOrFail();
        $fosterPreference = FosterPreference::where('fosterFamily_id', '=', $fosterFamily->id)->firstOrFail();
        // Show pets & roommates
        $roommates = PetsAndRoommatesController::showRoommatesByFosterId($fosterFamily->id);
        $pets = PetsAndRoommatesController::showPetsByFosterId($fosterFamily->id);
        $species = (['Kat', 'Hond', 'Knaagdier', 'Vogel']);
        $relation = (['Partner', 'Kind', 'Ouder']);

        return view('auth.fosterAccount', compact('fosterFamily', 'user', 'fosterPreference', 'roommates', 'pets', 'species', 'relation'));
    }

    // Route to shelterAccount
    public function getShelterAccount($id)
    {
        $shelterDecryptID = Crypt::decryptString($id);
        $user = User::find(auth()->user()->id);
        $shelter = Shelter::where('id', '=', $shelterDecryptID)->firstOrFail();
        return view('auth.shelterAccount', compact('user', 'shelter'));
    }
}
