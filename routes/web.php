<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;

include_once 'auth.php';

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function() {
    return redirect()->route('dashboard');
})->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'update']);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('users', \App\Http\Controllers\UserController::class)->except(['show']);
    Route::get('users/datatable', [\App\Http\Controllers\UserController::class, 'datatable'])->name('users.datatable');
});
