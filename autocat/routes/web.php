<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\CatOverviewController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\FosterFamilyController;
use App\Http\Controllers\MedicalController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|




/*Route::get('/kattenOverzicht', function () {
    return view('catOverview');
});*/

Route::get('/kattenOverzicht', [CatOverviewController::class, 'getCats']);

Route::get('/pleeggezinAccount', function () {
    return view('auth.fosterAccount');
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
Route::post('/cats/ajax', [CatController::class, 'filterCats']);
Route::get('/catPref/ajax/{id}', [CatController::class, 'getPreferenceByCatId']);
Route::get('/fosterfamily/ajax/{id}', [FosterFamilyController::class, 'getFosterFamilyById']);
Route::delete('/notifications_delete/{id}', [DashBoardController::class, 'delete'])->name('delete');
Route::post('/addNotification', [DashBoardController::class, 'store'])->name('addNotification');
Route::post('/addNotificationShelter', [DashBoardController::class, 'storeShelter'])->name('addNotificationShelter');

//catDetail routes
Route::get('katDetail', function () {
    $cats = CatController::getCats();
    $adoptionStatus = (['Aangemeld', 'Bij Pleeggezin', 'In Asiel', 'Klaar voor adoptie', 'In optie', 'Adoptie goedgekeurd', 'Bij Adoptiegezin']);
    $breed = (['Europees korthaar', 'Abessijn', 'Amerikaanse bobtail', 'American Curl', 'American wirehair', 'Amerikaans korthaar', 'Ashera', 'Asian', 'Australian Mist', 'Balinees', 'Bengaal', 'Blauwe Rus', 'Boheemse Rex', 'Bombay', 'Britse korthaar', 'Britse langhaar', 'Burmees', 'Burmilla', 'California Spangled', 'Ceylon', 'Chartreux', 'Cornish Rex', 'Cymric', 'Devon Rex', 'Don Sphynx', 'Dragon Li', 'Egyptische Mau', 'Exotic', 'German Rex', 'Havana Brown', 'Heilige Birmaan', 'Highlander', 'Japanse Bobtail', 'Kanaani', 'Khao Manee', 'Korat', 'Kurillen stompstaartkat', 'LaPerm', 'Lykoi', 'Maine Coon', 'Mandalay', 'Manx', 'Mekong bobtail', 'Munchkin', 'Nebelung', 'Neva Masquerade', 'Noorse boskat', 'Ocicat', 'Ojos Azules', 'Oosters korthaar', 'Oosters langhaar', 'Pers', 'Peterbald', 'Pixie-Bob', 'Ragamuffin', 'Ragdoll', 'Savannah', 'Scottish Fold', 'Selkirk Rex', 'Serengeti', 'Seychellois', 'Siamees', 'Siberische kat', 'Singapura', 'Snowshoe', 'Sokoke', 'Somali', 'Sphynx', 'Thai', 'Tibetaan', 'Tiffanie', 'Tonkanees', 'Turkse Angora', 'Turkse Van', 'Ural Rex', 'York Chocolate']);
    $furLength = (['Kort','Lang']);
    $gender = (['Kattin','Kater']);
    $socialization = (['Tam','Bang','Wild']);
    $reason = (['Vaccinatie','Chip','Vaccinatie & chip','Sterilisatie','']);
    $fosterFamilies = FosterFamilyController::getFosterFamilies();

    return view('catDetail', compact('cats', 'adoptionStatus', 'breed', 'furLength', 'gender', 'socialization','fosterFamilies'));
});

/* Route::get('/katDetail', [CatController::class, 'storeCatPreferences'])->name('storeCatPreferences');*/
Route::post('/katDetail', [CatController::class, 'storeCat'])->name('storeCat');
Route::get('/katDetail/{id}', [CatController::class, 'showCatById'])->name('showCatById');

//Medical routes
Route::get('/weighing_delete/{id}', [MedicalController::class, 'deleteWeighing'])->name('weighing_delete');
Route::get('/vetVisit_delete/{id}', [MedicalController::class, 'deleteVetVisit'])->name('vetVisit_delete');
Route::post('/addWeighing', [MedicalController::class, 'storeWeighing'])->name('storeWeighing');
Route::post('/addVetVisit', [MedicalController::class, 'storeVetVisit'])->name('storeVetVisit');
Route::post('/updateCat/{id}', [CatController::class, 'updateCat'])->name('updateCat');

require __DIR__ . '/auth.php';
