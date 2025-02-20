<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PacienteRequest;
use App\Http\Resources\PacienteResource;
use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Operador;

class PacientesController extends BaseController
{

    /**
     * @OA\Get(
     *     path="/api/pacientes",
     *     summary="Obtener todos los pacientes",
     *     tags={"Pacientes"},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de pacientes obtenida con éxito",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Paciente"))
     *     )
     * )
     */
    public function index()
    {
        $this->authorize('viewAny', Paciente::class);
        return PacienteResource::collection(Paciente::all());
    }

    /**
     * @OA\Post(
     *     path="/api/pacientes",
     *     summary="Crear un nuevo paciente",
     *     tags={"Pacientes"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Paciente")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Paciente creado con éxito",
     *         @OA\JsonContent(ref="#/components/schemas/Paciente")
     *     )
     * )
     */
    public function store(PacienteRequest $request)
    {
        $this->authorize('create', Paciente::class);
        $paciente = Paciente::create($request->validated());
        return $this->sendResponse($paciente, 'Paciente creado con éxito', 201); 
    }

    /**
     * @OA\Get(
     *     path="/api/pacientes/{id}",
     *     summary="Obtener un paciente por ID",
     *     tags={"Pacientes"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID del paciente",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Paciente obtenido con éxito",
     *         @OA\JsonContent(ref="#/components/schemas/Paciente")
     *     )
     * )
     */
    public function show(Paciente $paciente)
    {
        $this->authorize('view', $paciente);
        return $this->sendResponse($paciente, 'Paciente obtenido con éxito', 200);
    }

    /**
     * @OA\Put(
     *     path="/api/pacientes/{id}",
     *     summary="Actualizar un paciente",
     *     tags={"Pacientes"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID del paciente",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Paciente")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Paciente actualizado con éxito",
     *         @OA\JsonContent(ref="#/components/schemas/Paciente")
     *     )
     * )
     */
    public function update(PacienteRequest $request, Paciente $paciente)
    {
        $this->authorize('update', $paciente);
        $paciente->update($request->validated());
        return $this->sendResponse($paciente, 'Paciente actualizado con éxito', 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/pacientes/{id}",
     *     summary="Eliminar un paciente",
     *     tags={"Pacientes"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID del paciente",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Paciente eliminado con éxito"
     *     )
     * )
     */
    public function destroy(Paciente $paciente)
    {
        $this->authorize('delete', $paciente);
        $paciente->delete();
        return $this->sendResponse($paciente, 'Paciente eliminado con éxito', 200);
    }
}
