<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/katDetail', function (){
    return view('catDetail');
});

Route::get('/kattenOverzicht', function (){
    return view('catOverview');
});

Route::get('/pleeggezinAccount', function (){
    return view('fosterAccount');
});

Route::get('/pleeggezinDashboard', function (){
    return view('fosterDashboard');
});

Route::get('/pleeggezinnenOverzicht', function (){
    return view('fosterOverview');
});

Route::get('/login', function (){
    return view('login');
});

Route::get('/asielAccount', function (){
    return view('shelterAccount');
});

Route::get('/asielDashboard', function (){
    return view('shelterDashboard');
});










Route::get('/Login', function (){
    return view('login');
});
