<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PacientesController;
use App\Http\Controllers\Api\ContactosController;
use App\Http\Controllers\Api\LlamadaSalienteController;
use App\Http\Controllers\Api\LlamadaEntranteController;
use App\Http\Controllers\Api\AvisosController;
use App\Http\Controllers\Api\ZonasController;
use App\Http\Controllers\Api\OperadoresController;
use App\Http\Controllers\Api\ReportesController;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\Models\User;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/auth/google', function () {
    return response()->json(   ['url' => Socialite::driver('google')->stateless()->redirect()->getTargetUrl()]);
});

Route::get('/auth/google/callback', function (Request $request) {
    try
    {
        $googleUser = Socialite::driver('google')->stateless()->user();
        $user = User::updateOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'google_id' => $googleUser->getId(),
            ]
        );
        $token = $user->createToken('google-auth')->plainTextToken;
        return response()->json(['user' => $user, 'token' => $token]);
    } catch (\Exception $e) {
        return response()->json(['error' => 'No s\'ha pogut autenticar'], 401);
    }
    });

Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::apiResource('pacientes', PacientesController::class);

    Route::get('/pacientes/{id}/contactos', [ContactosController::class, 'show']);
    Route::post('/pacientes/{id}/contactos', [ContactosController::class, 'store']);
    Route::put('/contactos/{id}', [ContactosController::class, 'update']);
    Route::delete('/contactos/{id}', [ContactosController::class, 'destroy']);

    Route::get('/llamadas-salientes', [LlamadaSalienteController::class, 'index']);
    Route::post('/llamadas-salientes', [LlamadaSalienteController::class, 'store']);
    Route::get('/llamadas-salientes/{id}', [LlamadaSalienteController::class, 'show']);
    Route::put('/llamadas-salientes/{id}', [LlamadaSalienteController::class, 'update']);
    Route::delete('/llamadas-salientes/{id}', [LlamadaSalienteController::class, 'destroy']);
    Route::get('/pacientes/{id}/llamadas-salientes', [LlamadaSalienteController::class, 'byPaciente']);

    Route::get('/llamadas-entrantes', [LlamadaEntranteController::class, 'index']);
    Route::post('/llamadas-entrantes', [LlamadaEntranteController::class, 'store']);
    Route::get('/llamadas-entrantes/{id}', [LlamadaEntranteController::class, 'show']);
    Route::put('/llamadas-entrantes/{id}', [LlamadaEntranteController::class, 'update']);
    Route::delete('/llamadas-entrantes/{id}', [LlamadaEntranteController::class, 'destroy']);
    Route::get('/pacientes/{id}/llamadas-entrantes', [LlamadaEntranteController::class, 'byPaciente']);

    Route::get('/avisos', [AvisosController::class, 'index']);
    Route::post('/avisos', [AvisosController::class, 'store']);
    Route::get('/avisos/{id}', [AvisosController::class, 'show']);
    Route::put('/avisos/{id}', [AvisosController::class, 'update']);
    Route::delete('/avisos/{id}', [AvisosController::class, 'destroy']);

    Route::get('/zonas', [ZonasController::class, 'index']);
    Route::get('/zonas/{zona}', [ZonasController::class, 'show']);
    Route::get('/zonas/{id}/pacientes', [ZonasController::class, 'pacientes']);
    Route::get('/zonas/{id}/operadores', [OperadoresController::class, 'index']); 

    /* Route::get('/reportes/emergencias', [ReportesController::class, 'emergencias']);
    Route::get('/reportes/pacientes', [ReportesController::class, 'pacientes']);
    Route::get('/reportes/llamadas-programadas', [ReportesController::class, 'llamadasProgramadas']);
    Route::get('/reportes/llamadas-realizadas', [ReportesController::class, 'llamadasRealizadas']);
    Route::get('/reportes/historico-paciente/{id}', [ReportesController::class, 'historicoPaciente']);
    */
});
