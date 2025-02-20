<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Operador;

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


            return $this->sendResponse($result, 'Operador autenticado correctamente', 200);
        }

        return $this->sendError('No autorizado.', ['error' => 'Correo o contraseña incorrectos'], 400);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return $this->sendResponse([], 'Operador cerrado sesión correctamente', 200);
    }
}
