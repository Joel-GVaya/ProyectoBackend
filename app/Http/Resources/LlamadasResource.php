<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     description="Recurso Llamada para formatear la respuesta de una llamada.",
 *     title="LlamadasResource",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="ID de la llamada",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="fecha_hora",
 *         type="string",
 *         format="date-time",
 *         description="Fecha y hora de la llamada",
 *         example="2024-02-18T14:30:00Z"
 *     ),
 *     @OA\Property(
 *         property="tipo",
 *         type="string",
 *         description="Tipo de llamada (entrante o saliente)",
 *         example="saliente"
 *     ),
 *     @OA\Property(
 *         property="subtipo",
 *         type="string",
 *         description="Subtipo de la llamada",
 *         nullable=true,
 *         example="consulta médica"
 *     ),
 *     @OA\Property(
 *         property="descripcion",
 *         type="string",
 *         description="Descripción de la llamada",
 *         example="Llamada de seguimiento con el paciente"
 *     ),
 *     @OA\Property(
 *         property="operador",
 *         type="string",
 *         description="Nombre del operador que realizó la llamada",
 *         nullable=true,
 *         example="Carlos López"
 *     ),
 *     @OA\Property(
 *         property="paciente",
 *         type="string",
 *         description="Nombre del paciente asociado a la llamada",
 *         nullable=true,
 *         example="María González"
 *     ),
 *     @OA\Property(
 *         property="planificado",
 *         type="boolean",
 *         description="Indica si la llamada fue planificada",
 *         example=true
 *     ),
 *     @OA\Property(
 *         property="aviso",
 *         type="integer",
 *         description="ID del aviso relacionado con la llamada",
 *         nullable=true,
 *         example=5
 *     )
 * )
 */
class LlamadasResource extends JsonResource
{
    /**
     * Transforma el recurso en un array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'fecha_hora' => $this->fecha_hora,
            'tipo' => $this->tipo ?? 'saliente',
            'subtipo' => $this->subtipo ?? null,
            'descripcion' => $this->descripcion,
            'operador' => $this->operador ? $this->operador->nombre : null,
            'paciente' => $this->paciente ? $this->paciente->nombre : null,
            'planificado' => $this->planificado ?? false,
            'aviso' => $this->aviso_id ? $this->aviso_id : null,
        ];
    }
}
