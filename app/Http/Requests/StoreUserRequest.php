<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
/**
 * @OA\Schema(
 *     description="Solicitud para crear un nuevo usuario.",
 *     title="StoreUserRequest",
 *     required={"nombre", "telefono", "correo", "rol", "zona_id", "idiomas", "fecha_contrato", "nombre_user", "password"},
 *     @OA\Property(
 *         property="nombre",
 *         type="string",
 *         description="Nombre del usuario.",
 *         example="Juan Perez"
 *     ),
 *     @OA\Property(
 *         property="telefono",
 *         type="string",
 *         description="Numero de telefono del usuario.",
 *         example="123456789"
 *     ),
 *     @OA\Property(
 *         property="correo",
 *         type="string",
 *         description="Correo electronico del usuario.",
 *         example="6s4dD@example.com"
 *     ),
 *     @OA\Property(
 *         property="rol",
 *         type="string",     
 *         description="Rol del usuario.",
 *         example="Administrador"
 *     ),
 *     @OA\Property(
 *         property="zona_id",
 *         type="integer",
 *         description="ID de la zona del usuario.",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="idiomas",
 *         type="string",
 *         description="Idiomas del usuario.",
 *         example="Español"
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
 *         description="Fecha de baja del contrato.",
 *         example="2025-01-01"
 *     ),
 *     @OA\Property(
 *         property="nombre_user",
 *         type="string",
 *         description="Nombre de usuario del usuario.",
 *         example="jperez"
 *     ),
 *     @OA\Property(
 *         property="password",
 *         type="string",
 *         description="Contraseña del usuario.",
 *         example="password123"
 *     )
 * )
 */
class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        $user = request()->user();
        return $user && $user->esAdmin();
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:100',
            'telefono' => 'required|string|max:20',
            'correo' => 'required|email|unique:users,correo',
            'rol' => 'required|in:Administrador,Usuario',
            'zona_id' => 'required|exists:zonas,id',
            'idiomas' => 'nullable|string|max:50',
            'fecha_contrato' => 'required|date',
            'fecha_baja' => 'nullable|date',
            'nombre_user' => 'required|string|max:15|unique:users,nombre_user',
            'password' => 'required|string|min:6|confirmed',
        ];
    }
}
