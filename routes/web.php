<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use app\Http\Middleware\EnsureUserHasRole;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\VehiculeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Route::resource('clients', ClientController::class);
   // Route::get('/search', [ClientController::class, 'search'])->name('clients.search');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
   
});

/*Route::middleware(['auth','role=admin'])->group(function(){
    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
});
*/
Route::middleware(['auth', 'role:admin'])->prefix('clients')->group(function () {
    Route::get('/', [ClientController::class, 'index'])->name('clients.index');
    Route::get('/edit/{id}', [ClientController::class, 'edit'])->name('clients.edit');
    Route::post('/update/{id}', [ClientController::class, 'update'])->name('clients.update');
    Route::get('/delete/{id}', [ClientController::class, 'destroy'])->name('clients.delete');
    Route::get('/create', [ClientController::class, 'create'])->name('clients.create');
    Route::post('/store', [ClientController::class, 'store'])->name('clients.store');
    Route::get('/search', [ClientController::class, 'search'])->name('clients.search');
    Route::get('/carent', [VehiculeController::class, 'index0'])->name('admin.home');

   
});
Route::middleware(['auth', 'role:admin'])->prefix('Reservations')->group(function () {
    Route::get('/', [ReservationsController::class, 'index'])->name('reservations.index');
    Route::get('/edit/{id}', [ReservationsController::class, 'edit'])->name('reservations.edit');
    Route::post('/update/{id}', [ReservationsController::class, 'update'])->name('reservations.update');
    Route::get('/delete/{id}', [ReservationsController::class, 'destroy'])->name('reservations.delete');
    Route::get('/create', [ReservationsController::class, 'create'])->name('reservations.create');
    Route::post('/store', [ReservationsController::class, 'store'])->name('reservations.store');
    Route::get('/search', [ReservationsController::class, 'search'])->name('reservations.search');
    
});
Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/carent', [VehiculeController::class, 'index0'])->name('admin.home');
        Route::get('/vehicules0',[VehiculeController::class,'index0'])->name('Allvehicules0');
        Route::any('/vehicules/form', [VehiculeController::class,'form'] )->name('formvehicule');
        Route::any('/vehicules/add', [VehiculeController::class,'add'] )->name('addvehicule');
        Route::get('/vehicules/{id}/delete', [VehiculeController::class,'del'])->name('delvehicule');
        Route::get('/vehicules/{id}/edit',[VehiculeController::class,'edt'])->name('editvehicule');
        Route::any('/vehicules/{id}/update',[VehiculeController::class,'updt'])->name('updatevehicule');
        Route::any('/vehicules0/Research',[VehiculeController::class,'rscha'])->name('researchvehicles0');
        Route::get('/reservations',[ReservationsController::class,'index'])->name('Allreservations');
        Route::any('/reservations/Research',[ReservationsController::class,'resch'])->name('researchreservations');
});
Route::middleware(['auth', 'role:client'])->group(function () {
    Route::get('/vehicules1',[VehiculeController::class,'index1'])->name('Allvehicules1'); 
        Route::any('/vehicules1/Research',[VehiculeController::class,'rschc'])->name('researchvehicles1');
        Route::any('/vehicules1/Reserver',[VehiculeController::class, 'reserver'])->name('reserver');// Aicha
        Route::any('/vehicules1/mesreservations',[ReservationsController::class,'mine'])->name('mesreservations');
        Route::any('/vehicules1/rschmine',[ReservationsController::class,'rschm'])->name('recherchemine');
        Route::any('/reservations/{id}/mine', [ReservationsController::class, 'mine'])->name('mesreservations');
        Route::any('/vehicules1/{id}/rschmine', [ReservationsController::class, 'rschm'])->name('recherchemine');
        Route::any('/reservations/{id}/{iu}/formreserver',[ReservationsController::class,'formreserver'])->name('formreserver');// we have $userId defined in dashboard and we have allvehicules1 in dashboard ig we're good to go 
        Route::any('/reservations/{id}/{iu}/reserver',[ReservationsController::class,'reserver'])->name('reserver');
    
});




require __DIR__.'/auth.php';
