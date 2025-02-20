<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
/**
 * @OA\Schema(
 *     description="Solicitud para crear o actualizar un contacto.",
 *     title="ContactosRequest",
 *     required={"nombre", "telefono", "correo", "relacion", "paciente_id"},
 *     @OA\Property(
 *         property="nombre",
 *         type="string",
 *         description="Nombre del contacto.",
 *         maxLength=255,
 *         example="Juan Pérez"
 *     ),
 *     @OA\Property(
 *         property="telefono",
 *         type="string",
 *         description="Número de teléfono del contacto.",
 *         maxLength=15,
 *         example="123456789"
 *     ),
 *     @OA\Property(
 *         property="correo",
 *         type="string",
 *         description="Correo electrónico del contacto.",
 *         maxLength=255,
 *         example="juan.perez@correo.com"
 *     ),
 *     @OA\Property(
 *         property="relacion",
 *         type="string",
 *         description="Relación del contacto con el paciente.",
 *         maxLength=255,
 *         example="Hermano"
 *     ),
 *     @OA\Property(
 *         property="paciente_id",
 *         type="integer",
 *         description="ID del paciente al que pertenece el contacto.",
 *         example=1
 *     )
 * )
 */
class ContactosRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado a hacer esta petición.
     */
    public function authorize(): bool
    {
        return true; // Cambiar a true para permitir la validación
    }

    /**
     * Reglas de validación.
     */
    public function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'correo' => 'required|string|email|max:255|unique:contactos,correo,' . $this->route('contacto'),
            'relacion' => 'required|string|max:255',
            'paciente_id' => 'required|exists:pacientes,id',
        ];
    }
}
