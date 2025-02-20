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
            'tipo' => $this->faker->randomElement(['emergencia', 'no_urgente']),
            'subtipo' => $this->faker->word,
            'descripcion' => $this->faker->sentence,
            'duracion' => $this->faker->numberBetween(30, 3600), 
        ];
    }
}
