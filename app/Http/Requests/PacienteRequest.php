<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
/**
 * @OA\Schema(
 *     description="Solicitud para crear o actualizar un paciente.",
 *     title="PacienteRequest",
 *     required={"nombre", "fecha_nac", "DNI", "num_sip", "telefono", "correo", "direccion", "ciudad", "cp", "zona", "sit_personal", "sit_sanitaria", "sit_habitaculo", "sit_economica", "autonomia", "persona_contacto"},
 *     @OA\Property(
 *         property="nombre",
 *         type="string",
 *         description="Nombre del paciente.",
 *         maxLength=100,
 *         example="Juan Pérez"
 *     ),
 *     @OA\Property(
 *         property="fecha_nac",
 *         type="string",
 *         format="date",
 *         description="Fecha de nacimiento del paciente.",
 *         example="1990-01-01"
 *     ),
 *     @OA\Property(
 *         property="DNI",
 *         type="string",
 *         description="DNI del paciente.",
 *         maxLength=15,
 *         example="12345678A"
 *     ),
 *     @OA\Property(
 *         property="num_sip",
 *         type="integer",
 *         description="Número de SIP del paciente.",
 *         example=12345678
 *     ),
 *     @OA\Property(
 *         property="telefono",
 *         type="string",
 *         description="Teléfono del paciente.",
 *         maxLength=20,
 *         example="612345678"
 *     ),
 *     @OA\Property(
 *         property="correo",
 *         type="string",
 *         format="email",
 *         description="Correo electrónico del paciente.",
 *         maxLength=100,
 *         example="juan.perez@example.com"
 *     ),
 *     @OA\Property(
 *         property="direccion",
 *         type="string",
 *         description="Dirección del paciente.",
 *         example="Calle Falsa 123"
 *     ),
 *     @OA\Property(
 *         property="ciudad",
 *         type="string",
 *         description="Ciudad del paciente.",
 *         maxLength=50,
 *         example="Madrid"
 *     ),
 *     @OA\Property(
 *         property="cp",
 *         type="integer",
 *         description="Código postal del paciente.",
 *         example=28001
 *     ),
 *     @OA\Property(
 *         property="zona",
 *         type="integer",
 *         description="Zona del paciente, basada en la ID de zona.",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="sit_personal",
 *         type="string",
 *         description="Situación personal del paciente.",
 *         maxLength=50,
 *         example="Soltero"
 *     ),
 *     @OA\Property(
 *         property="sit_sanitaria",
 *         type="string",
 *         description="Situación sanitaria del paciente.",
 *         maxLength=50,
 *         example="Activo"
 *     ),
 *     @OA\Property(
 *         property="sit_habitaculo",
 *         type="string",
 *         description="Situación habitacional del paciente.",
 *         maxLength=50,
 *         example="Propietario"
 *     ),
 *     @OA\Property(
 *         property="sit_economica",
 *         type="string",
 *         description="Situación económica del paciente.",
 *         maxLength=50,
 *         example="Estable"
 *     ),
 *     @OA\Property(
 *         property="autonomia",
 *         type="boolean",
 *         description="Autonomía del paciente.",
 *         example=true
 *     ),
 *     @OA\Property(
 *         property="persona_contacto",
 *         type="string",
 *         description="Persona de contacto en caso de emergencia.",
 *         example="María Pérez"
 *     )
 * )
 */
class PacienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:100',
            'fecha_nac' => 'required|date',
            'DNI' => 'required|string|max:15|unique:pacientes,DNI',
            'num_sip' => 'required|integer|unique:pacientes,num_sip',
            'telefono' => 'required|string|max:20',
            'correo' => 'required|email|max:100',
            'direccion' => 'required|string',
            'ciudad' => 'required|string|max:50',
            'cp' => 'required|integer',
            'zona' => 'required|exists:zonas,id',
            'sit_personal' => 'required|string|max:50',
            'sit_sanitaria' => 'required|string|max:50',
            'sit_habitaculo' => 'required|string|max:50',
            'sit_economica' => 'required|string|max:50',
            'autonomia' => 'required|boolean',
            'persona_contacto' => 'required',
        ];
    }
}
