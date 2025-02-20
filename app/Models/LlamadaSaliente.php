<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @OA\Schema(
 *     description="Modelo LlamadaSaliente que representa una llamada saliente relacionada con un paciente.",
 *     title="LlamadaSaliente",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="ID de la llamada saliente",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="fecha_hora",
 *         type="string",
 *         format="date-time",
 *         description="Fecha y hora en que se realizó la llamada",
 *         example="2025-02-18T16:00:00"
 *     ),
 *     @OA\Property(
 *         property="user_id",
 *         type="integer",
 *         description="ID del operador que realizó la llamada",
 *         example=2
 *     ),
 *     @OA\Property(
 *         property="paciente_id",
 *         type="integer",
 *         description="ID del paciente relacionado con la llamada",
 *         example=3
 *     ),
 *     @OA\Property(
 *         property="descripcion",
 *         type="string",
 *         description="Descripción de la llamada",
 *         example="Llamada realizada para seguimiento de tratamiento"
 *     ),
 *     @OA\Property(
 *         property="planificado",
 *         type="boolean",
 *         description="Indica si la llamada estaba planificada",
 *         example=true
 *     ),
 *     @OA\Property(
 *         property="aviso_id",
 *         type="integer",
 *         description="ID del aviso relacionado con la llamada",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="duracion",
 *         type="integer",
 *         description="Duración de la llamada en segundos",
 *         example=240
 *     )
 * )
 */
class LlamadaSaliente extends Model
{
    use HasFactory;

    protected $table = 'llamadas_salientes';

    protected $fillable = [
        'fecha_hora',
        'user_id',
        'paciente_id',
        'descripcion',
        'planificado',
        'aviso_id',
        'duracion',
    ];

    public function operador()
    {
        return $this->belongsTo(User::class);
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function aviso()
    {
        return $this->belongsTo(Aviso::class);
    }
}
