<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @OA\Schema(
 *     description="Modelo Contacto que representa los datos de contacto de un paciente.",
 *     title="Contacto",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="ID del contacto",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="nombre",
 *         type="string",
 *         description="Nombre del contacto",
 *         example="Juan Pérez"
 *     ),
 *     @OA\Property(
 *         property="telefono",
 *         type="string",
 *         description="Teléfono del contacto",
 *         example="612345678"
 *     ),
 *     @OA\Property(
 *         property="correo",
 *         type="string",
 *         description="Correo electrónico del contacto",
 *         example="juanperez@example.com"
 *     ),
 *     @OA\Property(
 *         property="relacion",
 *         type="string",
 *         description="Relación del contacto con el paciente",
 *         example="Amigo"
 *     ),
 *     @OA\Property(
 *         property="paciente_id",
 *         type="integer",
 *         description="ID del paciente relacionado con el contacto",
 *         example=1
 *     )
 * )
 */
class Contacto extends Model
{
    use HasFactory;

    protected $table = 'contactos';
    
    protected $fillable = [
        'nombre',
        'telefono',
        'correo',
        'relacion',
        'paciente_id'
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}
