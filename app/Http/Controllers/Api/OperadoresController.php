<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Http\Requests\OperadoresRequest;


class OperadoresController extends BaseController
{
    /**
     * @OA\Get(
     *     path="/api/operadores",
     *     summary="Obtener todos los operadores",
     *     tags={"Operadores"},
     *     @OA\Response(
     *         response=200,
     *         description="Operadores obtenidos con éxito",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/User"))
     *     )
     * )
     */
    public function index()
    {
        $operadores = User::all();
        return $this->sendResponse($operadores, 'Operadores obtenidos con éxito', 200);
    }

    /**
     * @OA\Post(
     *     path="/api/operadores",
     *     summary="Crear un nuevo operador",
     *     tags={"Operadores"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Operador creado con éxito",
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     )
     * )
     */
    public function store(OperadoresRequest $request)
    {
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

        return $this->sendResponse($operador, 'Operador obtenido con éxito', 200);
    }

    /**
     * @OA\Put(
     *     path="/api/operadores/{id}",
     *     summary="Actualizar un operador",
     *     tags={"Operadores"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID del operador",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Operador actualizado con éxito",
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     )
     * )
     */
    public function update(Request $request, User $operador)
    {
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
        $operador->delete();
        return $this->sendResponse(null, 'Operador eliminado con éxito', 200);
    }
}