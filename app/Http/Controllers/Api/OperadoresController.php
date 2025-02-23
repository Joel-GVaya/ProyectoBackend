<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Requests\OperadoresRequest;
use App\Models\User;
use Illuminate\Http\Request;

class OperadoresController extends BaseController
{
    public function index()
    {
        $this->authorize('viewAny', User::class);
        $operadores = User::all();
        return $this->sendResponse($operadores, 'Operadores obtenidos con éxito', 200);
    }

    public function store(OperadoresRequest $request)
    {
        $this->authorize('create', User::class);
        $operador = User::create($request->validated());
        return $this->sendResponse($operador, 'Operador creado con éxito', 201);
    }

    public function show($id)
    {
        $operador = User::find($id);

        if (!$operador) {
            return $this->sendError('Operador no encontrado', [], 404);
        }
    
        $this->authorize('view', $operador);
        return $this->sendResponse($operador, 'Operador obtenido con éxito', 200);
    }

    public function update(OperadoresRequest $request, User $operador)
    {
        $this->authorize('update', $operador);
        $operador->update($request->validated());
        return $this->sendResponse($operador, 'Operador actualizado con éxito', 200);
    }

    public function destroy(User $operador)
    {
        $this->authorize('delete', $operador);
        $operador->delete();
        return $this->sendResponse(null, 'Operador eliminado con éxito', 200);
    }
}
