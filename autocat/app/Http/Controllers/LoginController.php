<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */     
     public function authenticate(Request $request) {
         $credentials = $request->validate([
             'email' => ['required', 'email'],
             'password' => ['required'],
         ]);
         // Auth facade 
         // Laravel automatically hashes password value before comparison 
         // Specify conditions here for Foster & Shelter database search!
         if (Auth::attempt($credentials)) {
             $request->session()->regenerate();
             return redirect()->intended('fosterDashboard');
         }
         else {
             return back()->withErrors([
                 'email' => 'Your email or password is invalid.'])->onlyInput('email');
         }
     }
}
