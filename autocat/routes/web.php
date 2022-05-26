<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\CatOverviewController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\FosterFamilyController;
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
/* // Login
Route::post('custom-login', [LoginController::class, 'customLogin'])->name('login.custom');
Route::get('/', function () {
    return view('login');
});
 */

/*Route::get('/kattenOverzicht', function () {
    return view('catOverview');
});*/
Route::get('/kattenOverzicht', [CatOverviewController::class, 'getCats']);

Route::get('/pleeggezinAccount', function () {
    return view('fosterAccount');
});

Route::get('/pleeggezinDashboard', function () {
    return view('fosterDashboard');
});
// TODO Change this to be used with a a controller if necessary
Route::get('/pleeggezinnenOverzicht', function () {
    return view('fosterOverview', ['fosterFamilies' => FosterFamilyController::getFosterFamilies()]);
});

Route::get('/asielAccount', function () {
    return view('shelterAccount');
});

Route::get('/asielDashboard', function () {
    return view('shelterDashboard');
});

Route::get('/welkom', function () {
    return view('welcome');
});

Route::get('/privacyverklaring', function () {
    return view('privacy');
});

Route::get('/notifications/{fosterId}', [DashBoardController::class, 'showByFosterId'])->name('notifications');
Route::get('/asielDashboard', [DashBoardController::class, 'showShelterNotifications'])->name('shelterNotifications');
Route::get('/asielDashboard/ajax/{fosterId}', [DashBoardController::class, 'getCatsByFosterId']);
Route::get('/cat/ajax/{id}', [CatController::class, 'getCatById']);
Route::get('/fosterfamily/ajax/{id}', [FosterFamilyController::class, 'getFosterFamilyById']);
Route::delete('/notifications_delete/{id}', [DashBoardController::class, 'delete'])->name('delete');
Route::post('/addNotification', [DashBoardController::class, 'store'])->name('addNotification');
Route::post('/addNotificationShelter', [DashBoardController::class, 'storeShelter'])->name('addNotificationShelter');

//catDetail routes
Route::get('katDetail', function () {
    $cats = CatController::getCats();
    return view('catDetail', compact('cats'));
});

Route::post('/katDetail',[CatController::class,'storeCat'])->name('storeCat');
Route::get('/katDetail/{id}',[CatController::class,'showCatById'])->name('showCatById');

require __DIR__.'/auth.php';
