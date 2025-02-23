<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\ZonaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

Route::get('auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('auth.google.callback');

Route::resource('zonas', ZonaController::class);
Route::resource('users', UserController::class);//->middleware('auth');

require __DIR__.'/auth.php';
