<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
/**
 * @OA\Schema(
 *     description="Solicitud para crear o actualizar un operador.",
 *     title="OperadoresRequest",
 *     required={"nombre", "correo", "rol", "nombre_user"},
 *     @OA\Property(
 *         property="nombre",
 *         type="string",
 *         description="Nombre del operador.",
 *         maxLength=255,
 *         example="Juan Pérez"
 *     ),
 *     @OA\Property(
 *         property="telefono",
 *         type="string",
 *         description="Número de teléfono del operador.",
 *         maxLength=20,
 *         example="612345678"
 *     ),
 *     @OA\Property(
 *         property="correo",
 *         type="string",
 *         description="Correo electrónico del operador.",
 *         format="email",
 *         maxLength=255,
 *         example="juan.perez@example.com"
 *     ),
 *     @OA\Property(
 *         property="rol",
 *         type="string",
 *         description="Rol del operador.",
 *         maxLength=50,
 *         example="Administrador"
 *     ),
 *     @OA\Property(
 *         property="zona",
 *         type="string",
 *         description="Zona asignada al operador.",
 *         maxLength=100,
 *         example="Madrid"
 *     ),
 *     @OA\Property(
 *         property="idiomas",
 *         type="string",
 *         description="Idiomas hablados por el operador.",
 *         maxLength=255,
 *         example="Español, Inglés"
 *     ),
 *     @OA\Property(
 *         property="fecha_contrato",
 *         type="string",
 *         format="date",
 *         description="Fecha de inicio del contrato.",
 *         example="2025-01-01"
 *     ),
 *     @OA\Property(
 *         property="fecha_baja",
 *         type="string",
 *         format="date",
 *         description="Fecha de baja del operador.",
 *         example="2025-12-31"
 *     ),
 *     @OA\Property(
 *         property="nombre_user",
 *         type="string",
 *         description="Nombre de usuario para el operador.",
 *         maxLength=255,
 *         example="juanperez"
 *     ),
 *     @OA\Property(
 *         property="password",
 *         type="string",
 *         description="Contraseña del operador.",
 *         minLength=6,
 *         example="password123"
 *     )
 * )
 */
class OperadoresRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para hacer esta solicitud.
     */
    public function authorize(): bool
    {
        return true; 
    }

    /**
     * Reglas de validación para la solicitud.
     */
    public function rules(): array
    {
        $operadorId = $this->route('operador') ? $this->route('operador')->id : null;

        return [
            'nombre' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'correo' => ['required', 'email', Rule::unique('operadores')->ignore($operadorId)],
            'rol' => 'required|string|max:50',
            'zona' => 'nullable|string|max:100',
            'idiomas' => 'nullable|string|max:255',
            'fecha_contrato' => 'nullable|date',
            'fecha_baja' => 'nullable|date|after_or_equal:fecha_contrato',
            'nombre_user' => ['required', 'string', 'max:255', Rule::unique('operadores')->ignore($operadorId)],
            'password' => $this->isMethod('post') ? 'required|string|min:6' : 'sometimes|string|min:6',
        ];
    }
}
