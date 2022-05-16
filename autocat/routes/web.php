<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Login

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('custom-login', [LoginController::class, 'customLogin'])->name('login.custom');
/* Route::get('registration', [LoginController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [LoginController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [LoginController::class, 'signOut'])->name('signout');
 */

/* Route::get('/login', function () {
    return view('login');
});
Route::post('/fosterDashboard', [LoginController::class, 'authenticate']); */

Route::get('/', function () {
    return view('welcome');
});

Route::get('/katDetail', function () {
    return view('catDetail');
});

Route::get('/kattenOverzicht', function () {
    return view('catOverview');
});

Route::get('/pleeggezinAccount', function () {
    return view('fosterAccount');
});

Route::get('/pleeggezinDashboard', function () {
    return view('fosterDashboard');
});

Route::get('/pleeggezinnenOverzicht', function () {
    return view('fosterOverview');
});

Route::get('/asielAccount', function () {
    return view('shelterAccount');
});

Route::get('/asielDashboard', function () {
    return view('shelterDashboard');
});


Route::get('/privacy', function () {
    return view('privacy');
});
