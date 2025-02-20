<?php

namespace App\Http\Controllers\Api;

use App\Models\Aviso;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Http\Requests\AvisosRequest;
use App\Http\Resources\AvisosResource;
use App\Models\Operador;

class AvisosController extends BaseController
{
    /**
     * @OA\Get(
     *     path="/api/avisos",
     *     summary="Obtener todos los avisos y alarmas",
     *     tags={"Avisos"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de avisos obtenida",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/AvisosResource")
     *             ),
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Lista de avisos y alarmas obtenida con éxito."
     *             )
     *         )
     *     )
     * )
     */
    public function index()
    {
        $this->authorize('viewAny', Aviso::class);
        $avisos = Aviso::all();
        return $this->sendResponse(AvisosResource::collection($avisos), 'Lista de avisos y alarmas obtenida con éxito.');
    }

    /**
     * @OA\Post(
     *     path="/api/avisos",
     *     summary="Crear nuevo aviso/alarma",
     *     tags={"Avisos"},
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/AvisosRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Aviso creado con éxito",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="data",
     *                 ref="#/components/schemas/AvisosResource"
     *             ),
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Aviso/alarma creado con éxito."
     *             )
     *         )
     *     )
     * )
     */
    public function store(AvisosRequest $request)
    {
        $this->authorize('create', Aviso::class);
        $aviso = Aviso::create($request->validated());
        return $this->sendResponse(new AvisosResource($aviso), 'Aviso/alarma creado con éxito.', 201);
    }

    /**
     * @OA\Get(
     *     path="/api/avisos/{id}",
     *     summary="Obtener aviso específico",
     *     tags={"Avisos"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID del aviso",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Aviso obtenido con éxito",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="data",
     *                 ref="#/components/schemas/AvisosResource"
     *             ),
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Aviso/alarma obtenido con éxito."
     *             )
     *         )
     *     )
     * )
     */
    public function show($id)
    {
        $aviso = Aviso::findOrFail($id);
        $this->authorize('view', $aviso);
        return $this->sendResponse(new AvisosResource($aviso), 'Aviso/alarma obtenido con éxito.');
    }

    /**
     * @OA\Put(
     *     path="/api/avisos/{id}",
     *     summary="Actualizar aviso",
     *     tags={"Avisos"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID del aviso a actualizar",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/AvisosRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Aviso actualizado",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="data",
     *                 ref="#/components/schemas/AvisosResource"
     *             ),
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Aviso/alarma actualizado con éxito."
     *             )
     *         )
     *     )
     * )
     */
    public function update(AvisosRequest $request, $id)
    {
        $aviso = Aviso::findOrFail($id);
        $this->authorize('update', $aviso);
        $aviso->update($request->validated());
        return $this->sendResponse(new AvisosResource($aviso), 'Aviso/alarma actualizado con éxito.');
    }

    /**
     * @OA\Delete(
     *     path="/api/avisos/{id}",
     *     summary="Eliminar aviso",
     *     tags={"Avisos"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID del aviso a eliminar",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Aviso eliminado",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="data",
     *                 type="object",
     *                 example=null
     *             ),
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Aviso/alarma eliminado con éxito."
     *             )
     *         )
     *     )
     * )
     */
    public function destroy($id)
    {
        $aviso = Aviso::findOrFail($id);
        $this->authorize('delete', $aviso);
        $aviso->delete();
        return $this->sendResponse($aviso, 'Aviso/alarma eliminado con éxito.');
    }
}