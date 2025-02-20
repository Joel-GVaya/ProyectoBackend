<?php

namespace App\Http\Controllers\Api;

use App\Models\Contacto;
use App\Http\Requests\ContactosRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class ContactosController extends BaseController
{
    /**
     * @OA\Get(
     *     path="/api/contactos/{id}",
     *     summary="Obtener un contacto",
     *     tags={"Contactos"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID del contacto",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Contacto obtenido con éxito",
     *         @OA\JsonContent(ref="#/components/schemas/Contacto")
     *     )
     * )
     */
    public function show($paciente_id)
    {
        $contactos = Contacto::where('paciente_id', $paciente_id)->get();
        
        if ($contactos->isEmpty()) {
            return $this->sendError('No se encontraron contactos para este paciente.', 404);
        }
    
        return $this->sendResponse($contactos, 'Lista de contactos obtenida con éxito.', 200);
    }
    

    /**
     * @OA\Post(
     *     path="/api/contactos",
     *     summary="Añadir un nuevo contacto",
     *     tags={"Contactos"},
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Contacto")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Contacto añadido con éxito",
     *         @OA\JsonContent(ref="#/components/schemas/Contacto")
     *     )
     * )
     */
    public function store(ContactosRequest $request)
    {
        $contacto = Contacto::create($request->validated());

        return $this->sendResponse($contacto, 'Contacto añadido con éxito.', 201);
    }

    /**
     * @OA\Put(
     *     path="/api/contactos/{id}",
     *     summary="Actualizar un contacto existente",
     *     tags={"Contactos"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID del contacto",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Contacto")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Contacto actualizado con éxito",
     *         @OA\JsonContent(ref="#/components/schemas/Contacto")
     *     )
     * )
     */
    public function update(ContactosRequest $request, $id)
    {
        $contacto = Contacto::findOrFail($id);
        $this->authorize('update', $contacto);

        $contacto->update($request->validated());

        return $this->sendResponse($contacto, 'Contacto actualizado con éxito.', 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/contactos/{id}",
     *     summary="Eliminar un contacto",
     *     tags={"Contactos"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID del contacto",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Contacto eliminado con éxito"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Contacto no encontrado"
     *     )
     * )
     */
    public function destroy($id)
    {
        $contacto = Contacto::findOrFail($id);
        $this->authorize('delete', $contacto);

        $contacto->delete();

        return $this->sendResponse($contacto, 'Contacto eliminado con éxito.', 200);
    }
}