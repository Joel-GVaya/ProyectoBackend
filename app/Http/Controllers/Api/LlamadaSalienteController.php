<?php

namespace App\Http\Controllers\Api;

use App\Models\LlamadaSaliente;
use App\Http\Requests\LlamadasSalientesRequest;
use App\Http\Resources\LlamadasSalientesResource;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class LlamadaSalienteController extends BaseController
{
    /**
     * @OA\Get(
     *     path="/api/llamadas-salientes",
     *     summary="Listar todas las llamadas salientes",
     *     tags={"Llamadas Salientes"},
     *     @OA\Response(response=200, description="Lista de llamadas salientes obtenida con éxito.")
     * )
     */
    public function index()
    {
        $llamadasSalientes = LlamadaSaliente::all();
        return $this->sendResponse(LlamadasSalientesResource::collection($llamadasSalientes), 200);
    }

/**
 * @OA\Post(
 *     path="/api/llamadas-salientes",
 *     summary="Crear una llamada saliente",
 *     tags={"Llamadas Salientes"},
 *     @OA\RequestBody(
 *         required=true,
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Llamada creada con éxito",
 *     ),
 *     @OA\Response(response=422, description="Datos inválidos.")
 * )
 */
    public function store(LlamadasSalientesRequest $request)
    {
        $llamada = LlamadaSaliente::create($request->validated());
        return $this->sendResponse(new LlamadasSalientesResource($llamada), 'Llamada creada con éxito.', 201);
    }

    /**
     * @OA\Get(
     *     path="/api/llamadas-salientes/{id}",
     *     summary="Obtener detalles de una llamada saliente",
     *     tags={"Llamadas Salientes"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Detalles de la llamada obtenidos con éxito."),
     *     @OA\Response(response=404, description="Llamada no encontrada.")
     * )
     */
    public function show($id)
    {
        $llamada = LlamadaSaliente::findOrFail($id);

        if (!$llamada) {
            return $this->sendError('Llamada no encontrada.', 404);
        }

        return $this->sendResponse(new LlamadasSalientesResource($llamada), 'Detalles de la llamada obtenidos con éxito.');
    }

    /**
     * @OA\Put(
     *     path="/api/llamadas-salientes/{id}",
     *     summary="Actualizar una llamada saliente",
     *     tags={"Llamadas Salientes"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/LlamadasSalientesResource")
     *     ),
     *     @OA\Response(response=200, description="Llamada actualizada con éxito."),
     *     @OA\Response(response=404, description="Llamada no encontrada.")
     * )
     */
    public function update(LlamadasSalientesRequest $request, $id)
    {
        $llamada = LlamadaSaliente::findOrFail($id);

        if (!$llamada) {
            return $this->sendError('Llamada no encontrada.', 404);
        }

        $llamada->update($request->validated());

        return $this->sendResponse(new LlamadasSalientesResource($llamada), 'Llamada actualizada con éxito.');
    }

    /**
     * @OA\Delete(
     *     path="/api/llamadas-salientes/{id}",
     *     summary="Eliminar una llamada saliente",
     *     tags={"Llamadas Salientes"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Llamada eliminada con éxito."),
     *     @OA\Response(response=404, description="Llamada no encontrada.")
     * )
     */
    public function destroy($id)
    {
        $llamada = LlamadaSaliente::findOrFail($id);

        if (!$llamada) {
            return $this->sendError('Llamada no encontrada.', 404);
        }

        $llamada->delete();

        return $this->sendResponse([], 'Llamada eliminada con éxito.');
    }

    /**
     * @OA\Get(
     *     path="/api/llamadas-salientes/paciente/{id}",
     *     summary="Listar todas las llamadas salientes de un paciente específico",
     *     tags={"Llamadas Salientes"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Lista de llamadas del paciente obtenida con éxito."),
     *     @OA\Response(response=404, description="No se encontraron llamadas para este paciente.")
     * )
     */
    public function byPaciente($id)
    {
        $llamadasSalientes = LlamadaSaliente::where('paciente_id', $id)->get();

        if ($llamadasSalientes->isEmpty()) {
            return $this->sendError('No se encontraron llamadas para este paciente.', 404);
        }

        return $this->sendResponse(LlamadasSalientesResource::collection($llamadasSalientes), 'Lista de llamadas del paciente obtenida con éxito.');
    }

    public function byUser($id)
    {
        $llamadasSalientes = LlamadaSaliente::where('user_id', $id)->get();

        if ($llamadasSalientes->isEmpty()) {
            return $this->sendError('No se encontraron llamadas para este usuario.', 404);
        }

        return $this->sendResponse(LlamadasSalientesResource::collection($llamadasSalientes), 'Lista de llamadas del usuario obtenida con éxito.');
    }
}
