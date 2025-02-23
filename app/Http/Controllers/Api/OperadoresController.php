<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Requests\OperadoresRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Request;

class OperadoresController extends BaseController
{


    public function index()
    {
        $this->authorize('viewAny', User::class);
        $this->authorize('viewAny', User::class);
        $operadores = User::all();
        return $this->sendResponse($operadores, 'Operadores obtenidos con éxito', 200);
<<<<<<< HEAD
        return $this->sendResponse($operadores, 'Operadores obtenidos con éxito', 200);
=======
>>>>>>> 3b34d17 (Calendario)
    }



    public function store(OperadoresRequest $request)
    {
        $this->authorize('create', User::class);
        $this->authorize('create', User::class);
        $operador = User::create($request->validated());
        return $this->sendResponse($operador, 'Operador creado con éxito', 201);
    }

    /**
     * @OA\Get(
     *     path="/api/operadores/{id}",
     *     summary="Obtener un operador por ID",
     *     tags={"Operadores"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID del operador",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Operador obtenido con éxito",
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     )
     * )
     */
    public function show($id)
    {
        $operador = User::find($id);

        if (!$operador) {
            return $this->sendError('Operador no encontrado', [], 404);
        }
<<<<<<< HEAD
    
        $this->authorize('view', $operador);
=======

>>>>>>> 3b34d17 (Calendario)
        return $this->sendResponse($operador, 'Operador obtenido con éxito', 200);
    }


    public function update(OperadoresRequest $request, User $operador)
    {
        $this->authorize('update', $operador);

    public function update(OperadoresRequest $request, User $operador)
    {
        $this->authorize('update', $operador);
        $operador->update($request->validated());
        return $this->sendResponse($operador, 'Operador actualizado con éxito', 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/operadores/{id}",
     *     summary="Eliminar un operador",
     *     tags={"Operadores"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID del operador",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Operador eliminado con éxito"
     *     )
     * )
     */
    public function destroy(User $operador)
    {
        $this->authorize('delete', $operador);
        $this->authorize('delete', $operador);
        $operador->delete();
        return $this->sendResponse(null, 'Operador eliminado con éxito', 200);
        return $this->sendResponse(null, 'Operador eliminado con éxito', 200);
    }
}