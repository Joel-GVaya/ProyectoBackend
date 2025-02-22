<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
/**
 * @OA\Schema(
 *     description="Solicitud para crear o actualizar un aviso.",
 *     title="AvisosRequest",
 *     required={"tipo", "descripcion", "paciente_id", "fecha_inicio", "estado"},
 *     @OA\Property(
 *         property="tipo",
 *         type="string",
 *         description="Tipo de aviso (ej. 'consulta', 'emergencia', etc.).",
 *         maxLength=50,
 *         example="consulta"
 *     ),
 *     @OA\Property(
 *         property="descripcion",
 *         type="string",
 *         description="Descripción del aviso.",
 *         maxLength=255,
 *         example="Aviso sobre el estado del paciente."
 *     ),
 *     @OA\Property(
 *         property="paciente_id",
 *         type="integer",
 *         description="ID del paciente asociado al aviso.",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="fecha_inicio",
 *         type="string",
 *         format="date",
 *         description="Fecha de inicio del aviso (formato 'YYYY-MM-DD').",
 *         example="2025-02-18"
 *     ),
 *     @OA\Property(
 *         property="estado",
 *         type="string",
 *         description="Estado del aviso (pendiente o resuelto).",
 *         enum={"pendiente", "resuelto"},
 *         example="pendiente"
 *     )
 * )
 */
class AvisosRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'tipo' => 'required|string|max:50',
            'descripcion' => 'required|string|max:255',
            'fecha_inicio' => 'required|date',
            'estado' => 'string|in:pendiente,resuelto',
        ];
    }
}
