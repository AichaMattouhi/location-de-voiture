<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use app\Http\Middleware\EnsureUserHasRole;


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
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
    Route::get('/clientsEdit/{id}', [ClientController::class, 'edit'])->name('clients.edit');
    Route::post('/clientsUpadte/{id}', [ClientController::class, 'update'])->name('clients.update');
    Route::get('/clientsdelete/{id}', [ClientController::class, 'destroy'])->name('clients.delete');
    Route::get('/clientsCreate', [ClientController::class, 'create'])->name('clients.create');
    Route::get('/clientstore', [ClientController::class,'store'])->name('clients.store');
    Route::get('/clientsearch', [ClientController::class,'search'])->name('clients.search');
});




require __DIR__.'/auth.php';
