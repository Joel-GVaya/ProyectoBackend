<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
/**
 * @OA\Schema(
 *     description="Recurso Paciente para formatear la respuesta de un paciente.",
 *     title="PacienteResource",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="ID del paciente",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="nombre",
 *         type="string",
 *         description="Nombre del paciente",
 *         example="Ana Martínez"
 *     ),
 *     @OA\Property(
 *         property="fecha_nacimiento",
 *         type="string",
 *         format="date",
 *         description="Fecha de nacimiento del paciente",
 *         example="1980-05-12"
 *     ),
 *     @OA\Property(
 *         property="DNI",
 *         type="string",
 *         description="Documento Nacional de Identidad del paciente",
 *         example="12345678X"
 *     ),
 *     @OA\Property(
 *         property="numero_sip",
 *         type="string",
 *         description="Número de SIP (Sistema de Información Poblacional) del paciente",
 *         example="123456789"
 *     ),
 *     @OA\Property(
 *         property="telefono",
 *         type="string",
 *         description="Teléfono del paciente",
 *         example="612345678"
 *     ),
 *     @OA\Property(
 *         property="correo",
 *         type="string",
 *         description="Correo electrónico del paciente",
 *         example="ana.martinez@example.com"
 *     ),
 *     @OA\Property(
 *         property="direccion",
 *         type="string",
 *         description="Dirección del paciente",
 *         example="Calle Mayor 123, Valencia"
 *     ),
 *     @OA\Property(
 *         property="ciudad",
 *         type="string",
 *         description="Ciudad de residencia del paciente",
 *         example="Valencia"
 *     ),
 *     @OA\Property(
 *         property="codigo_postal",
 *         type="string",
 *         description="Código postal del paciente",
 *         example="46001"
 *     ),
 *     @OA\Property(
 *         property="zona",
 *         type="string",
 *         description="Zona asignada al paciente",
 *         example="Zona Centro"
 *     ),
 *     @OA\Property(
 *         property="situacion_personal",
 *         type="string",
 *         description="Situación personal del paciente",
 *         example="Vive solo"
 *     ),
 *     @OA\Property(
 *         property="situacion_sanitaria",
 *         type="string",
 *         description="Estado de salud del paciente",
 *         example="Diabetes tipo 2"
 *     ),
 *     @OA\Property(
 *         property="situacion_habitaculo",
 *         type="string",
 *         description="Condiciones de vivienda del paciente",
 *         example="Piso en buenas condiciones"
 *     ),
 *     @OA\Property(
 *         property="situacion_economica",
 *         type="string",
 *         description="Situación económica del paciente",
 *         example="Pensión mínima"
 *     ),
 *     @OA\Property(
 *         property="autonomia",
 *         type="boolean",
 *         description="Indica si el paciente es autónomo",
 *         example=true
 *     ),
 *     @OA\Property(
 *         property="persona_contacto",
 *         type="string",
 *         description="Nombre de la persona de contacto",
 *         example="Juan Pérez"
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         format="date-time",
 *         description="Fecha de creación del registro",
 *         example="2024-02-18T14:30:00Z"
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         type="string",
 *         format="date-time",
 *         description="Fecha de última actualización del registro",
 *         example="2024-02-18T16:45:00Z"
 *     )
 * )
 */
class PacienteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'fecha_nacimiento' => $this->fecha_nac,
            'DNI' => $this->DNI,
            'numero_sip' => $this->num_sip,
            'telefono' => $this->telefono,
            'correo' => $this->correo,
            'direccion' => $this->direccion,
            'ciudad' => $this->ciudad,
            'codigo_postal' => $this->cp,
            'zona' => $this->zona,
            'situacion_personal' => $this->sit_personal,
            'situacion_sanitaria' => $this->sit_sanitaria,
            'situacion_habitaculo' => $this->sit_habitaculo,
            'situacion_economica' => $this->sit_economica,
            'autonomia' => $this->autonomia,
            'persona_contacto' => $this->persona_contacto,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
