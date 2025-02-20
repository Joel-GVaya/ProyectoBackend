<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
/**
 * @OA\Schema(
 *     description="Recurso Operador para formatear la respuesta de un operador.",
 *     title="OperadoresResource",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="ID del operador",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="nombre",
 *         type="string",
 *         description="Nombre del operador",
 *         example="Carlos López"
 *     ),
 *     @OA\Property(
 *         property="telefono",
 *         type="string",
 *         description="Teléfono del operador",
 *         example="612345678"
 *     ),
 *     @OA\Property(
 *         property="correo",
 *         type="string",
 *         description="Correo electrónico del operador",
 *         example="carlos.lopez@example.com"
 *     ),
 *     @OA\Property(
 *         property="rol",
 *         type="string",
 *         description="Rol del operador",
 *         example="Supervisor"
 *     ),
 *     @OA\Property(
 *         property="zona",
 *         type="string",
 *         description="Zona asignada al operador",
 *         example="Zona Norte"
 *     ),
 *     @OA\Property(
 *         property="idiomas",
 *         type="string",
 *         description="Idiomas hablados por el operador",
 *         example="Español, Inglés"
 *     ),
 *     @OA\Property(
 *         property="fecha_contrato",
 *         type="string",
 *         format="date",
 *         description="Fecha de inicio del contrato",
 *         example="2023-06-15"
 *     ),
 *     @OA\Property(
 *         property="fecha_baja",
 *         type="string",
 *         format="date",
 *         description="Fecha de baja del operador (si aplica)",
 *         nullable=true,
 *         example=null
 *     ),
 *     @OA\Property(
 *         property="nombre_user",
 *         type="string",
 *         description="Nombre de usuario del operador",
 *         example="carlosl"
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         format="date-time",
 *         description="Fecha de creación del registro",
 *         example="2024-02-18T14:30:00Z"
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         type="string",
 *         format="date-time",
 *         description="Fecha de última actualización del registro",
 *         example="2024-02-18T16:45:00Z"
 *     )
 * )
 */
class OperadoresResource extends JsonResource
{
    /**
     * Transforma el recurso en un array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'telefono' => $this->telefono,
            'correo' => $this->correo,
            'rol' => $this->rol,
            'zona' => $this->zona,
            'idiomas' => $this->idiomas,
            'fecha_contrato' => $this->fecha_contrato,
            'fecha_baja' => $this->fecha_baja,
            'nombre_user' => $this->nombre_user,
            'zona' => $this->zona,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
