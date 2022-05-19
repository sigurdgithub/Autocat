<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\NotificationController;
=======
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\LoginController;
>>>>>>> dd8e0e207c846d77d1bdac63d353b34482a3d6e1


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
/* // Login
Route::post('custom-login', [LoginController::class, 'customLogin'])->name('login.custom');
Route::get('/', function () {
    return view('login');
});
 */
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
