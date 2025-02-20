<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
/**
 * @OA\Schema(
 *     description="Recurso Reporte para formatear la respuesta de un reporte.",
 *     title="ReportesResource",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="ID del reporte",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="tipo",
 *         type="string",
 *         description="Tipo de reporte (por defecto 'llamada')",
 *         example="llamada"
 *     ),
 *     @OA\Property(
 *         property="paciente_id",
 *         type="integer",
 *         nullable=true,
 *         description="ID del paciente asociado al reporte",
 *         example=10
 *     ),
 *     @OA\Property(
 *         property="operador_id",
 *         type="integer",
 *         nullable=true,
 *         description="ID del operador que realizó el reporte",
 *         example=5
 *     ),
 *     @OA\Property(
 *         property="descripcion",
 *         type="string",
 *         description="Descripción del reporte",
 *         example="El paciente no respondió a la llamada"
 *     ),
 *     @OA\Property(
 *         property="fecha_hora",
 *         type="string",
 *         format="date-time",
 *         nullable=true,
 *         description="Fecha y hora en que se generó el reporte",
 *         example="2024-02-18T10:30:00Z"
 *     )
 * )
 */
class ReportesResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'tipo' => $this->tipo ?? 'llamada',
            'paciente_id' => $this->paciente_id ?? null,
            'operador_id' => $this->operador_id ?? null,
            'descripcion' => $this->descripcion ?? 'Sin descripción',
            'fecha_hora' => $this->fecha_hora ?? null,
        ];
    }
}
