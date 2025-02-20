<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @OA\Schema(
 *     description="Modelo Paciente que representa la información de un paciente.",
 *     title="Paciente",
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
 *         example="Juan Pérez"
 *     ),
 *     @OA\Property(
 *         property="fecha_nac",
 *         type="string",
 *         format="date",
 *         description="Fecha de nacimiento del paciente",
 *         example="1985-06-15"
 *     ),
 *     @OA\Property(
 *         property="DNI",
 *         type="string",
 *         description="DNI del paciente",
 *         example="12345678A"
 *     ),
 *     @OA\Property(
 *         property="num_sip",
 *         type="string",
 *         description="Número de SIP del paciente",
 *         example="1234567890"
 *     ),
 *     @OA\Property(
 *         property="telefono",
 *         type="string",
 *         description="Número de teléfono del paciente",
 *         example="600123456"
 *     ),
 *     @OA\Property(
 *         property="correo",
 *         type="string",
 *         description="Correo electrónico del paciente",
 *         example="juan.perez@example.com"
 *     ),
 *     @OA\Property(
 *         property="direccion",
 *         type="string",
 *         description="Dirección del paciente",
 *         example="Calle Falsa 123"
 *     ),
 *     @OA\Property(
 *         property="ciudad",
 *         type="string",
 *         description="Ciudad del paciente",
 *         example="Madrid"
 *     ),
 *     @OA\Property(
 *         property="cp",
 *         type="string",
 *         description="Código postal del paciente",
 *         example="28001"
 *     ),
 *     @OA\Property(
 *         property="zona",
 *         type="string",
 *         description="Zona geográfica del paciente",
 *         example="Centro"
 *     ),
 *     @OA\Property(
 *         property="sit_personal",
 *         type="string",
 *         description="Situación personal del paciente",
 *         example="Soltero"
 *     ),
 *     @OA\Property(
 *         property="sit_sanitaria",
 *         type="string",
 *         description="Situación sanitaria del paciente",
 *         example="En tratamiento"
 *     ),
 *     @OA\Property(
 *         property="sit_habitaculo",
 *         type="string",
 *         description="Situación habitacional del paciente",
 *         example="Vivienda propia"
 *     ),
 *     @OA\Property(
 *         property="sit_economica",
 *         type="string",
 *         description="Situación económica del paciente",
 *         example="Estable"
 *     ),
 *     @OA\Property(
 *         property="autonomia",
 *         type="boolean",
 *         description="Indica si el paciente es autónomo",
 *         example=true
 *     ),
 *     @OA\Property(
 *         property="persona_contacto",
 *         type="array",
 *         items={
 *             @OA\Items(
 *                 type="string",
 *                 example="María Pérez"
 *             )
 *         },
 *         description="Información de la persona de contacto del paciente",
 *     )
 * )
 */
class Paciente extends Model
{
    use HasFactory;

    protected $table = 'pacientes';

    protected $fillable = [
        'nombre',
        'fecha_nac',
        'DNI',
        'num_sip',
        'telefono',
        'correo',
        'direccion',
        'ciudad',
        'cp',
        'zona_id',
        'sit_personal',
        'sit_sanitaria',
        'sit_habitaculo',
        'sit_economica',
        'autonomia',
    ];


    public function zona()
    {
        return $this->belongsTo(Zona::class);
    }

    public function llamadasEntrantes()
    {
        return $this->hasMany(LlamadaEntrante::class, 'paciente_id');
    }

    public function llamadasSalientes()
    {
        return $this->hasMany(LlamadaSaliente::class, 'paciente_id');
    }

    public function avisos()
    {
        return $this->hasMany(Aviso::class, 'paciente_id');
    }

    public function contactos()
    {
        return $this->hasMany(Contacto::class, 'paciente_id');
    }
}