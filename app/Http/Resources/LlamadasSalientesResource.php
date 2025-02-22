<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LlamadasSalientesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
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
