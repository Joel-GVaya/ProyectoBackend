<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @OA\Schema(
 *     description="Modelo Zona que representa una zona geográfica en el sistema.",
 *     title="Zona",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="ID de la zona",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="nombre",
 *         type="string",
 *         description="Nombre de la zona",
 *         example="Zona Norte"
 *     ),
 *     @OA\Property(
 *         property="ciudades",
 *         type="array",
 *         items={
 *             @OA\Items(type="string", example="Madrid")
 *         },
 *         description="Ciudades asociadas a la zona",
 *     ),
 *     @OA\Property(
 *         property="descripcion",
 *         type="string",
 *         description="Descripción de la zona",
 *         example="Zona que abarca el norte de la región."
 *     )
 * )
 */
class Zona extends Model
{
    use HasFactory;

    protected $table = 'zonas';

    protected $fillable = [
        'nombre',
        'ciudades',
        'descripcion',
    ];

    public function operadores()
    {
        return $this->hasMany(User::class);
    }

    public function pacientes()
    {
        return $this->hasMany(Paciente::class);
    }

    public function avisos()
    {
        return $this->hasMany(Aviso::class, 'zona_afectada');
    }
}
