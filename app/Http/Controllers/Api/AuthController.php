<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends BaseController
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'correo' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Error en la validación', $validator->errors()->toArray(), 400);
        }

        if (Auth::attempt(['correo' => $request->correo, 'password' => $request->password])) {
            $authOperador = Auth::user();

            $token = $authOperador->createToken('NombreDelToken')->plainTextToken;

            if (!$token) {
                return $this->sendError('Error al generar el token', ['error' => 'No se pudo generar el token'], 400);
            }

            $result['nombre'] = $authOperador->nombre;
            $result['id'] = $authOperador->id;
            $result['token'] = $token;
            $result['zona_id'] = $authOperador->zona_id;


            return $this->sendResponse($result, 'Operador autenticado correctamente', 200);
        }

        return $this->sendError('No autorizado.', ['error' => 'Correo o contraseña incorrectos'], 400);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return $this->sendResponse([], 'Operador cerrado sesión correctamente', 200);
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            $user = User::updateOrCreate(
                ['email' => $googleUser->email],
                [
                    'name' => $googleUser->name,
                    'google_id' => $googleUser->id,
                    'avatar' => $googleUser->avatar,
                    'password' => bcrypt(uniqid()),
                    'role' => 'Usuario',
                ]
            );

            Auth::login($user);

            $token = $user->createToken('Personal Access Token')->plainTextToken;

            return redirect()->to("http://localhost:5173/auth-success?token=$token");
        } catch (\Exception $e) {
            return redirect()->to("http://localhost:5173/auth-error");
        }
    }
}
