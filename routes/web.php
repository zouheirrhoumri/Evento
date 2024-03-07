<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrganisateurController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/f', function () {
    return view('organisationDashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('categories');
});

// organisation
Route::middleware(['auth', 'role:organisateur'])->group(function () {
    Route::get('/organisation/dashboard', [OrganisateurController::class, 'organisationDashboard'])->name('organisateur.dashboard');
    Route::get('/eventForm', [EventController::class, 'create'])->name('event.form');
    Route::post('/eventCreate', [EventController::class, 'store'])->name('event.store');
    Route::get('/events/{eventId}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{eventId}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');

});

require __DIR__ . '/auth.php';
