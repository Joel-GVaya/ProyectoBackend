<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     description="Solicitud para crear o actualizar una llamada entrante.",
 *     title="LlamadasEntrantesRequest",
 *     required={"fecha_hora", "user_id", "paciente_id", "descripcion"},
 *     @OA\Property(property="fecha_hora", type="string", format="date-time", description="Fecha y hora de la llamada.", example="2025-02-18T10:00:00"),
 *     @OA\Property(property="user_id", type="integer", description="ID del operador que recibe la llamada.", example=1),
 *     @OA\Property(property="paciente_id", type="integer", description="ID del paciente asociado a la llamada.", example=1),
 *     @OA\Property(property="subtipo", type="string", description="Subtipo de la llamada (opcional).", maxLength=255, example="Consulta médica"),
 *     @OA\Property(property="descripcion", type="string", description="Descripción de la llamada.", maxLength=500, example="Llamada de emergencia médica."),
 *     @OA\Property(property="emergencia", type="boolean", description="Indica si la llamada es de emergencia.", example=true),
 *     @OA\Property(property="duracion", type="integer", description="Duración de la llamada en segundos.", example=300)
 * )
 */
class LlamadasEntrantesRequest extends FormRequest
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
            'paciente' => 'required|exists:pacientes,id',
            'subtipo' => 'nullable|string|max:255',
            'descripcion' => 'required|string|max:500',
            'emergencia' => 'nullable|boolean',
            'duracion' => 'nullable|integer',
        ];
    }
}
