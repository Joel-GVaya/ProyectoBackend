<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @OA\Schema(
 *     schema="Aviso",
 *     type="object",
 *     title="Aviso",
 *     description="Modelo de Aviso",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="user_id", type="integer", example=10),
 *     @OA\Property(property="tipo", type="string", example="Mantenimiento"),
 *     @OA\Property(property="categoria", type="string", example="Eléctrico"),
 *     @OA\Property(property="descripcion", type="string", example="Revisión del sistema eléctrico"),
 *     @OA\Property(property="fecha_inicio", type="string", format="date", example="2025-02-18"),
 *     @OA\Property(property="frecuencia", type="string", example="Mensual"),
 *     @OA\Property(property="zona_afectada", type="string", example="Planta 2"),
 *     @OA\Property(property="paciente_id", type="integer", example=5),
 *     @OA\Property(property="estado", type="string", example="Pendiente")
 * )
 */
class Aviso extends Model
{
    use HasFactory;

    protected $table = 'avisos';

    protected $fillable = [
        'user_id',
        'tipo',
        'categoria',
        'descripcion',
        'fecha_inicio',
        'frecuencia',
        'zona_id',
        'paciente_id',
        'estado',
    ];

    public function operador()
    {
        return $this->belongsTo(User::class);
    }

    public function zona()
    {
        return $this->belongsTo(Zona::class, 'zona_id');
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}
