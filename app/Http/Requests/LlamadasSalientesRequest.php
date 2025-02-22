<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     description="Solicitud para crear o actualizar una llamada saliente.",
 *     title="LlamadasSalientesRequest",
 *     required={"fecha_hora", "user_id", "paciente_id", "descripcion"},
 *     @OA\Property(property="fecha_hora", type="string", format="date-time", description="Fecha y hora de la llamada.", example="2025-02-18T10:00:00"),
 *     @OA\Property(property="user_id", type="integer", description="ID del operador que realiza la llamada.", example=1),
 *     @OA\Property(property="paciente_id", type="integer", description="ID del paciente asociado a la llamada.", example=1),
 *     @OA\Property(property="descripcion", type="string", description="Descripción de la llamada.", maxLength=500, example="Llamada de seguimiento."),
 *     @OA\Property(property="planificado", type="boolean", description="Indica si la llamada fue planificada.", example=true),
 *     @OA\Property(property="duracion", type="integer", description="Duración de la llamada en segundos.", example=300),
 *     @OA\Property(property="aviso_id", type="integer", description="ID del aviso asociado a la llamada.", example=1)
 * )
 */
class LlamadasSalientesRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'fecha_hora' => 'required|date',
            'user_id' => 'required|exists:users,id',
            'paciente_id' => 'required|exists:pacientes,id',
            'descripcion' => 'required|string|max:500',
            'planificado' => 'nullable|boolean',
            'duracion' => 'nullable|integer',
            'aviso_id' => 'nullable|exists:avisos,id',
        ];
    }
}
