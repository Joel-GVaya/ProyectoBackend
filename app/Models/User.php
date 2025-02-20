<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
/**
 * @OA\Schema(
 *     description="Modelo User que representa a un usuario en el sistema.",
 *     title="User",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="ID del usuario",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="nombre",
 *         type="string",
 *         description="Nombre del usuario",
 *         example="Juan Pérez"
 *     ),
 *     @OA\Property(
 *         property="telefono",
 *         type="string",
 *         description="Número de teléfono del usuario",
 *         example="600123456"
 *     ),
 *     @OA\Property(
 *         property="correo",
 *         type="string",
 *         description="Correo electrónico del usuario",
 *         example="juan.perez@example.com"
 *     ),
 *     @OA\Property(
 *         property="rol",
 *         type="string",
 *         description="Rol del usuario (por ejemplo, 'Administrador', 'Operador')",
 *         example="Administrador"
 *     ),
 *     @OA\Property(
 *         property="zona_id",
 *         type="integer",
 *         description="ID de la zona asociada al usuario",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="idiomas",
 *         type="array",
 *         items={
 *             @OA\Items(type="string", example="Español")
 *         },
 *         description="Idiomas que habla el usuario",
 *     ),
 *     @OA\Property(
 *         property="fecha_contrato",
 *         type="string",
 *         format="date",
 *         description="Fecha de inicio del contrato del usuario",
 *         example="2022-01-01"
 *     ),
 *     @OA\Property(
 *         property="fecha_baja",
 *         type="string",
 *         format="date",
 *         description="Fecha de baja del usuario, si aplica",
 *         example="2025-01-01"
 *     ),
 *     @OA\Property(
 *         property="nombre_user",
 *         type="string",
 *         description="Nombre de usuario para inicio de sesión",
 *         example="juan.perez"
 *     ),
 *     @OA\Property(
 *         property="password",
 *         type="string",
 *         description="Contraseña del usuario",
 *         example="password123"
 *     )
 * )
 */
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, Notifiable, HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'id',
        'nombre',
        'telefono',
        'correo',
        'rol',
        'zona_id', 
        'idiomas',
        'fecha_contrato',
        'fecha_baja',
        'nombre_user',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function zona()
    {
        return $this->belongsTo(Zona::class, 'zona_id');  
    }

    public function avisos()
    {
        return $this->hasMany(Aviso::class, 'operador_id');
    }

    public function llamadasEntrantes()
    {
        return $this->hasMany(LlamadaEntrante::class, 'operador_id');
    }

    public function llamadasSalientes()
    {
        return $this->hasMany(LlamadaSaliente::class, 'operador_id');
    }

    public function esAdmin()
    {
        return $this->rol === 'Administrador';
    }
}