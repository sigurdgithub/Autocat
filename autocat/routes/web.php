<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatController;
use App\Http\Controllers\CatOverviewController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\FosterFamilyController;
use App\Http\Controllers\MedicalController;
use App\Http\Controllers\PetsAndRoommatesController;
use App\Http\Controllers\Auth\RegisteredUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

// ------- ALL USERS -------*/

Route::get('/privacyverklaring', function () {
    return view('privacy');
});

Route::get('/welkom', function () {
    return view('welcome');
})->name('welcome');

// ------- LOGGED IN USERS -------
Route::middleware('auth')->group(function () {

    /* --- GET --- */
    Route::get('/pleeggezinDashboard', function () {
        return view('fosterDashboard');
    })->name('fosterDashboard');

    Route::get('/notifications/{fosterId}', [DashBoardController::class, 'showByFosterId'])->name('notifications');

    Route::get('/pleeggezinAccount/{id}', [AuthenticatedSessionController::class, 'getFosterAccount'])->name('fosterAccount');

    //CatDetail routes
    Route::get('/katDetail', [CatController::class, 'showEmptyCat']);
    Route::get('/katDetail/{id}', [CatController::class, 'showCatById'])->name('showCatById');

    //Medical Routes => CatDetail
    Route::get('/weighing_delete/{id}', [MedicalController::class, 'deleteWeighing'])->name('weighing_delete');
    Route::get('/vetVisit_delete/{id}', [MedicalController::class, 'deleteVetVisit'])->name('vetVisit_delete');

    //Pet & roommate routes => Fosterfamily Account
    Route::get('/roommate_delete/{id}', [PetsAndRoommatesController::class, 'deleteRoommate'])->name('roommate_delete');
    Route::get('/pet_delete/{id}', [PetsAndRoommatesController::class, 'deletePet'])->name('pet_delete');

    Route::get('/kattenOverzicht', [CatOverviewController::class, 'getCats']);

    /* --- POST --- */
    Route::post('/cats/ajax', [CatController::class, 'filterCats']);

    //CatDetail routes
    Route::post('/katDetail', [CatController::class, 'storeCat'])->name('storeCat');
    Route::post('/updateCat/{id}', [CatController::class, 'updateCat'])->name('updateCat');

    //Medical Routes => CatDetail
    Route::post('/addWeighing', [MedicalController::class, 'storeWeighing'])->name('storeWeighing');
    Route::post('/addVetVisit', [MedicalController::class, 'storeVetVisit'])->name('storeVetVisit');

    //Pet & roommate routes => Fosterfamily Account
    Route::post('/addRoommate', [PetsAndRoommatesController::class, 'storeRoommate'])->name('storeRoommate');
    Route::post('/addPet', [PetsAndRoommatesController::class, 'storePet'])->name('storePet');

    Route::delete('/notifications_delete/{id}', [DashBoardController::class, 'delete'])->name('delete');
    Route::post('/addNotification', [DashBoardController::class, 'store'])->name('addNotification');

    // ------- ONLY FOSTER USERS ------- */
    Route::group(
        ['middleware' => 'foster',],
        function () {
            Route::post('/pleeggezinAccount/{id}', [RegisteredUserController::class, 'updateFoster'], [])->name('updateFoster');
        }
    );

    // ------- ONLY SHELTER USERS -------
    Route::group(
        ['middleware' => 'shelter',],
        function () {

            /* --- GET --- */
            Route::get('/asielDashboard', function () {
                return view('shelterDashboard');
            })->name('shelterDashboard');
            Route::get('/asielDashboard', [DashBoardController::class, 'showShelterNotifications'])->name('shelterNotifications');

            Route::get('/pleeggezinnenOverzicht', function () {
                return view('fosterOverview', ['fosterFamilies' => FosterFamilyController::getFosterFamilies()]);
            });

            Route::get('/asielAccount/{id}', [AuthenticatedSessionController::class, 'getShelterAccount'])->name('shelterAccount');

            Route::get('/asielDashboard/ajax/{fosterId}', [DashBoardController::class, 'getCatsByFosterId']);
            Route::get('/cat/ajax/{id}', [CatController::class, 'getCatById']);
            Route::get('/cats/ajax/{search}', [CatController::class, 'filterCatsByString']);
            Route::get('/fosterfamilies/ajax/{search}', [FosterFamilyController::class, 'filterFosterFamiliesByString']);
            Route::get('/catPref/ajax/{id}', [CatController::class, 'getPreferenceByCatId']);
            Route::get('/fosterfamily/ajax/{id}', [FosterFamilyController::class, 'getFosterFamilyById']);
            Route::get('/fosterPref/ajax/{id}', [FosterFamilyController::class, 'getPreferenceByFosterId']);

            /* --- POST --- */

            Route::post('/asielAccount/{id}', [RegisteredUserController::class, 'updateShelter'])->name('updateShelter');
            Route::post('/fosterfamilies/ajax', [FosterFamilyController::class, 'filterFosterFamilies']);
            Route::post('/addNotificationShelter', [DashBoardController::class, 'storeShelter'])->name('addNotificationShelter');
        }
    );
});
require __DIR__ . '/auth.php';
