<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
/**
 * @OA\Schema(
 *     description="Solicitud para crear o actualizar una zona.",
 *     title="ZonaRequest",
 *     required={"nombre"},
 *     @OA\Property(
 *         property="nombre",
 *         type="string",
 *         description="Nombre de la zona.",
 *         example="Zona Centro"
 *     ),
 *     @OA\Property(
 *         property="descripcion",
 *         type="string",
 *         description="Descripción adicional de la zona.",
 *         example="Zona con todas las ciudades del centro del país"
 *     )
 * )
 */
class ZonaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = request()->user();
        return $user && $user->esAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ];
    }
}
