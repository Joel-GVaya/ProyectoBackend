<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\ZonaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

Route::middleware(['auth', 'can:viewAny,App\Models\User'])->prefix('admin')->group(function () {
    Route::resource('users', UserController::class);
});

Route::middleware(['auth', 'can:viewAny,App\Models\Zona'])->group(function () {
    Route::resource('zonas', ZonaController::class);
});

require __DIR__.'/auth.php';
