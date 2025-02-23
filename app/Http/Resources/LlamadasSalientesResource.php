<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     schema="LlamadasSalientesResource",
 *     type="object",
 *     title="Llamada Saliente",
 *     description="Recurso que representa una llamada saliente",
 *     required={"id", "fecha_hora", "descripcion", "planificado", "duracion"},
 *     @OA\Property(property="id", type="integer", example=1, description="ID de la llamada"),
 *     @OA\Property(property="fecha_hora", type="string", format="date-time", example="2025-02-23T14:00:00Z", description="Fecha y hora de la llamada"),
 *     @OA\Property(property="descripcion", type="string", example="Llamada de seguimiento al paciente", description="Descripción de la llamada"),
 *     @OA\Property(property="user_id", type="integer", nullable=true, example=3, description="ID del usuario que realizó la llamada"),
 *     @OA\Property(property="paciente", type="integer", nullable=true, example=5, description="ID del paciente asociado a la llamada"),
 *     @OA\Property(property="planificado", type="boolean", example=true, description="Indica si la llamada fue planificada"),
 *     @OA\Property(property="duracion", type="integer", example=120, description="Duración de la llamada en segundos"),
 *     @OA\Property(property="aviso_id", type="integer", nullable=true, example=2, description="ID del aviso asociado a la llamada, si existe")
 * )
 */
class LlamadasSalientesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'fecha_hora' => $this->fecha_hora,
            'descripcion' => $this->descripcion,
            'user_id' => $this->user_id ?? null,
            'paciente_id' => $this->paciente->id ?? null,
            'planificado' => $this->planificado,
            'duracion' => $this->duracion,
            'aviso_id' => $this->aviso_id ?? null,
        ];
    }
}
