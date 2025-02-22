<?php

namespace App\Http\Controllers\Api;

use App\Models\LlamadaEntrante;
use App\Http\Requests\LlamadasEntrantesRequest;
use App\Http\Resources\LlamadasEntrantesResource;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class LlamadaEntranteController extends BaseController
{
    /**
     * @OA\Get(
     *     path="/api/llamadas",
     *     summary="Listar todas las llamadas",
     *     tags={"Llamadas"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de llamadas obtenida con éxito",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/LlamadasEntrantesResource"))
     *     )
     * )
     */
    public function index()
    {
        $llamadasEntrantes = LlamadaEntrante::all();
        return $this->sendResponse(LlamadasEntrantesResource::collection($llamadasEntrantes), 200);
    }

    /**
     * @OA\Post(
     *     path="/api/llamadas",
     *     summary="Crear una llamada entrante o saliente",
     *     tags={"Llamadas"},
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/LlamadasEntrantesRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Llamada creada con éxito",
     *         @OA\JsonContent(ref="#/components/schemas/LlamadasEntrantesResource")
     *     )
     * )
     */
    public function store(LlamadasEntrantesRequest $request)
    {
        $llamada = LlamadaEntrante::create($request->validated());
        return $this->sendResponse(new LlamadasEntrantesResource($llamada), 'Llamada creada con éxito.', 201);
    }

    /**
     * @OA\Get(
     *     path="/api/llamadas/{id}",
     *     summary="Obtener detalles de una llamada",
     *     tags={"Llamadas"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID de la llamada",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Detalles de la llamada obtenidos con éxito",
     *         @OA\JsonContent(ref="#/components/schemas/LlamadasEntrantesResource")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Llamada no encontrada"
     *     )
     * )
     */
    public function show($id)
    {
        $llamada = LlamadaEntrante::find($id);

        if (!$llamada) {
            return $this->sendError('Llamada no encontrada.', 404);
        }

        return $this->sendResponse(new LlamadasEntrantesResource($llamada), 'Detalles de la llamada obtenidos con éxito.');
    }

    /**
     * @OA\Put(
     *     path="/api/llamadas/{id}",
     *     summary="Actualizar una llamada existente",
     *     tags={"Llamadas"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID de la llamada",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/LlamadasEntrantesRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Llamada actualizada con éxito",
     *         @OA\JsonContent(ref="#/components/schemas/LlamadasEntrantesResource")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Llamada no encontrada"
     *     )
     * )
     */
    public function update(LlamadasEntrantesRequest $request, $id)
    {
        $llamada = LlamadaEntrante::find($id);

        if (!$llamada) {
            return $this->sendError('Llamada no encontrada.', 404);
        }

        $llamada->update($request->validated());

        return $this->sendResponse(new LlamadasEntrantesResource($llamada), 'Llamada actualizada con éxito.');
    }
    /**
     * @OA\Delete(
     *     path="/api/llamadas/{id}",
     *     summary="Eliminar una llamada",
     *     tags={"Llamadas"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID de la llamada",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Llamada eliminada con éxito"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Llamada no encontrada"
     *     )
     * )
     */
    public function destroy($id)
    {
        $llamada = LlamadaEntrante::find($id);

        if (!$llamada) {
            return $this->sendError('Llamada no encontrada.', 404);
        }

        $llamada->delete();

        return $this->sendResponse([], 'Llamada eliminada con éxito.', 200);
    }

    /**
     * @OA\Get(
     *     path="/api/pacientes/{id}/llamadas",
     *     summary="Listar todas las llamadas de un paciente específico",
     *     tags={"Llamadas"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID del paciente",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Lista de llamadas del paciente obtenida con éxito",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/LlamadasEntrantesResource"))
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="No se encontraron llamadas para este paciente"
     *     )
     * )
     */
    public function byPaciente($id)
    {
        $llamadasEntrantes = LlamadaEntrante::where('paciente_id', $id)->get();

        if ($llamadasEntrantes->isEmpty()) {
            return $this->sendError('No se encontraron llamadas para este paciente.', 404);
        }

        return $this->sendResponse(LlamadasEntrantesResource::collection($llamadasEntrantes), 'Lista de llamadas del paciente obtenida con éxito.');
    }

    public function byUser($id)
    {
        $llamadasEntrantes = LlamadaEntrante::where('user_id', $id)->get();

        if ($llamadasEntrantes->isEmpty()) {
            return $this->sendError('No se encontraron llamadas para este usuario.', 404);
        }

        return $this->sendResponse(LlamadasEntrantesResource::collection($llamadasEntrantes), 'Lista de llamadas del usuario obtenida con éxito.');
    }
}
