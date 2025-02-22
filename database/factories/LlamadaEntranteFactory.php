<?php

namespace Database\Factories;

use App\Models\LlamadaEntrante;
use App\Models\Operador;
use App\Models\Paciente;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class LlamadaEntranteFactory extends Factory
{
    protected $model = LlamadaEntrante::class;

    public function definition()
    {
        return [
            'fecha_hora' => $this->faker->dateTimeThisYear(),
            'user_id' => User::factory(),
            'paciente_id' => Paciente::factory(),
            'emergencia' => $this->faker->boolean,
            'subtipo' => $this->faker->randomElement([
                'Emergencias sociales',
                'Emergencias sanitarias',
                'Crisis de soledad o angustia',
                'Alarma sin respuesta',
                'Otro tipo de llamada',
                'Notificar ausencias o retornos',
                'Modificar datos personales',
                'Llamadas accidentales',
                'Solicitud de informacion',
                'Sugerencias, quejas o reclamaciones',
                'Llamadas sociales',
                'Registrar citas medicas',
            ]),
            'descripcion' => $this->faker->sentence,
            'duracion' => $this->faker->numberBetween(30, 3600),
        ];
    }
}
