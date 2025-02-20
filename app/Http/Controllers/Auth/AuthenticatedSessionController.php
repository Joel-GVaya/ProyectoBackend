<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_user' => 'required|string',
            'password' => 'required|string',
        ]);

        // Intenta autenticar al operador con los datos proporcionados
        if (Auth::guard('web')->attempt(['nombre_user' => $request->nombre_user, 'password' => $request->password])) {
            $operador = Auth::guard('web')->user();
            return redirect()->intended('/dashboard');
        }

        // Si no se pudo autenticar, lanza una excepción
        throw ValidationException::withMessages([
            'nombre_user' => ['Las credenciales proporcionadas son incorrectas.'],
        ]);
    }
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): Response
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->noContent();
    }
}
