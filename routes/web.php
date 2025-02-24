<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\ZonaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

Route::middleware(['auth'])->group(function (){
Route::get('/admin', function () {
    return view('admin.index');
})->name('admin.index');

Route::resource('zonas', ZonaController::class);
Route::resource('users', UserController::class);
});
require __DIR__.'/auth.php';
