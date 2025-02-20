<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
/**
 * @OA\Schema(
 *     schema="AvisosResource",
 *     description="Esquema del recurso Avisos",
 *     @OA\Property(property="id", type="integer", description="Identificador del aviso"),
 *     @OA\Property(property="tipo", type="string", description="Tipo de aviso"),
 *     @OA\Property(property="descripcion", type="string", description="Descripción del aviso"),
 *     @OA\Property(
 *         property="paciente",
 *         type="object",
 *         @OA\Property(property="id", type="integer", description="Identificador del paciente"),
 *         @OA\Property(property="nombre", type="string", description="Nombre del paciente")
 *     ),
 *     @OA\Property(property="fecha_inicio", type="string", format="date-time", description="Fecha y hora del aviso"),
 *     @OA\Property(property="estado", type="string", description="Estado del aviso")
 * )
 */
class AvisosResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'tipo' => $this->tipo,
            'descripcion' => $this->descripcion,
            'paciente' => [
                'id' => $this->paciente->id,
                'nombre' => $this->paciente->nombre,
            ],
            'fecha_inicio' => $this->fecha_inicio,
            'estado' => $this->estado,
        ];
    }
}
