<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Paciente;

/**
 * @OA\Schema(
 *     description="Modelo LlamadaEntrante que representa una llamada entrante relacionada con un paciente.",
 *     title="LlamadaEntrante",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="ID de la llamada entrante",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="fecha_hora",
 *         type="string",
 *         format="date-time",
 *         description="Fecha y hora en que se recibió la llamada",
 *         example="2025-02-18T14:30:00"
 *     ),
 *     @OA\Property(
 *         property="user_id",
 *         type="integer",
 *         description="ID del operador que atendió la llamada",
 *         example=2
 *     ),
 *     @OA\Property(
 *         property="paciente_id",
 *         type="integer",
 *         description="ID del paciente relacionado con la llamada",
 *         example=3
 *     ),
 *     @OA\Property(
 *         property="emergencia",
 *         type="string",
 *         description="Tipo de llamada (por ejemplo, emergencia o no)",
 *         example="Entrante"
 *     ),
 *     @OA\Property(
 *         property="subtipo",
 *         type="string",
 *         description="Subtipo de la llamada (por ejemplo, urgente, normal)",
 *         example="Urgente"
 *     ),
 *     @OA\Property(
 *         property="descripcion",
 *         type="string",
 *         description="Descripción de la llamada",
 *         example="Llamada solicitando cita para revisión"
 *     ),
 *     @OA\Property(
 *         property="duracion",
 *         type="integer",
 *         description="Duración de la llamada en segundos",
 *         example=180
 *     )
 * )
 */
class LlamadaEntrante extends Model
{
    use HasFactory;

    protected $table = 'llamadas_entrantes';

    protected $fillable = [
        'fecha_hora',
        'user_id',
        'paciente_id',
        'emergencia',
        'subtipo',
        'descripcion',
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
}
