<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
/**
 * @OA\Schema(
 *     description="Solicitud para crear o actualizar una llamada.",
 *     title="LlamadasRequest",
 *     required={"fecha_hora", "operador_id", "paciente_id", "descripcion"},
 *     @OA\Property(
 *         property="fecha_hora",
 *         type="string",
 *         format="date-time",
 *         description="Fecha y hora de la llamada.",
 *         example="2025-02-18T10:00:00"
 *     ),
 *     @OA\Property(
 *         property="operador_id",
 *         type="integer",
 *         description="ID del operador que realiza la llamada.",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="paciente_id",
 *         type="integer",
 *         description="ID del paciente asociado a la llamada.",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="tipo",
 *         type="string",
 *         description="Tipo de llamada (urgente o no urgente).",
 *         enum={"urgente", "no urgente"},
 *         example="urgente"
 *     ),
 *     @OA\Property(
 *         property="subtipo",
 *         type="string",
 *         description="Subtipo de la llamada (opcional).",
 *         maxLength=255,
 *         example="Información sobre tratamiento"
 *     ),
 *     @OA\Property(
 *         property="descripcion",
 *         type="string",
 *         description="Descripción de la llamada.",
 *         maxLength=500,
 *         example="Se realizó una llamada para seguir el tratamiento del paciente."
 *     ),
 *     @OA\Property(
 *         property="planificado",
 *         type="boolean",
 *         description="Indica si la llamada fue planificada.",
 *         example=true
 *     ),
 *     @OA\Property(
 *         property="aviso_id",
 *         type="integer",
 *         description="ID del aviso asociado a la llamada.",
 *         example=1
 *     )
 * )
 */
class LlamadasRequest extends FormRequest
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
            'tipo' => 'nullable|string|max:255',
            'subtipo' => 'nullable|string|max:255',
            'descripcion' => 'required|string|max:500',
            'planificado' => 'nullable|boolean',
            'aviso_id' => 'nullable|exists:avisos,id',
        ];
    }
}
