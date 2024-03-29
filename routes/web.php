<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrganisateurController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
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
    Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/admin/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/admin/categories/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/admin/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/admin/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::get('/admin/dashboard/users', [AdminController::class, 'userTable'])->name('admin.user');
    Route::post('/block-user/{userId}', [AdminController::class, 'blockUser'])->name('blockUser');
    Route::post('/unblock-user/{userId}', [AdminController::class, 'unblockUser'])->name('unblockUser');
    Route::get('/admin/dashboard/users', [AdminController::class, 'userTable'])->name('admin.user');
    Route::get('/admin/dashboard/events', [AdminController::class, 'showEvent'])->name('admin.event');
    Route::put('/events/{event}/update-status', [AdminController::class, 'updateEventStatus'])->name('events.updateStatus');
});

//user
Route::middleware(['auth', 'role:utilisateur'])->group(function () {
    Route::get('/events', [EventController::class, 'userDashboard'])->name('events.index');
    Route::post('/events/{eventId}/reserve', [EventController::class, 'reserve'])->name('events.reserve');
    Route::get('/events/{eventId}/ticket', [EventController::class, 'generateTicket'])->name('event.ticket');
    Route::post('/events', [EventController::class , 'search'])->name('search.events');
});
// organisation
Route::middleware(['auth', 'role:organisateur'])->group(function () {
    Route::get('/organisation/dashboard', [OrganisateurController::class, 'organisationDashboard'])->name('organisateur.dashboard');
    Route::get('/eventForm', [EventController::class, 'create'])->name('event.form');
    Route::post('/eventCreate', [EventController::class, 'store'])->name('event.store');
    Route::get('/events/{eventId}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{eventId}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
    Route::get('/reservations/non-valid', [ReservationController::class, 'showNonValidReservations'])->name('reservations.non-valid');  
    Route::put('/admin/confirm-event/{eventId}', [ReservationController::class, 'confirmReservation'])->name('reservations.confirm');  


});

require __DIR__ . '/auth.php';
