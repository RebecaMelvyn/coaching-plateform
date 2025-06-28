<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\CalendarController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Routes pour le profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Routes pour les entreprises
    Route::resource('companies', CompanyController::class);

    // Routes pour les participants
    Route::resource('participants', ParticipantController::class);

    // Routes pour les sessions
    Route::resource('sessions', SessionController::class);
    Route::post('sessions/{session}/register', [SessionController::class, 'store'])->name('sessions.register');
    Route::post('/sessions/{session}/register', [SessionController::class, 'register'])->name('sessions.register');
    Route::get('/sessions/create', [SessionController::class, 'create'])->name('sessions.create');
    Route::post('/sessions', [SessionController::class, 'store'])->name('sessions.store');

    // Route pour le calendrier
    Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar');
});

require __DIR__ . '/auth.php';
