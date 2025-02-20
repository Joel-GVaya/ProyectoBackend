<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
/**
 * @OA\Schema(
 *     description="Recurso Contacto para formatear la respuesta de un contacto.",
 *     title="ContactosResource",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="ID del contacto",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="nombre",
 *         type="string",
 *         description="Nombre del contacto",
 *         example="Juan Pérez"
 *     ),
 *     @OA\Property(
 *         property="telefono",
 *         type="string",
 *         description="Teléfono del contacto",
 *         example="612345678"
 *     ),
 *     @OA\Property(
 *         property="correo",
 *         type="string",
 *         description="Correo electrónico del contacto",
 *         example="juanperez@example.com"
 *     ),
 *     @OA\Property(
 *         property="relacion",
 *         type="string",
 *         description="Relación del contacto con el paciente",
 *         example="Amigo"
 *     ),
 *     @OA\Property(
 *         property="paciente_id",
 *         type="integer",
 *         description="ID del paciente relacionado con el contacto",
 *         example=1
 *     )
 * )
 */
class ContactosResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
