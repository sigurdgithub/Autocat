<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\CatController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

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


Route::get('/asielDashboard', function () {
    return view('shelterDashboard');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/privacy', function () {
    return view('privacy');
});

Route::get('/notifications/{fosterId}', [DashBoardController::class, 'showByFosterId'])->name('notifications');
Route::get('/asielDashboard', [DashBoardController::class, 'showShelterNotifications'])->name('shelterNotifications');
Route::get('/asielDashboard/ajax/{fosterId}', [DashBoardController::class, 'getCatsByFosterId']);
Route::get('/cat/ajax/{id}', [CatController::class, 'getCatById']);
Route::delete('/notifications_delete/{id}', [DashBoardController::class, 'delete'])->name('delete');
Route::post('/addNotification', [DashBoardController::class, 'store'])->name('addNotification');
Route::post('/addNotificationShelter', [DashBoardController::class, 'storeShelter'])->name('addNotificationShelter');


require __DIR__.'/auth.php';
