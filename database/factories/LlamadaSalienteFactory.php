<?php

namespace Database\Factories;
use App\Models\LlamadaSaliente;
use App\Models\Operador;
use App\Models\Paciente;
use App\Models\Aviso;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class LlamadaSalienteFactory extends Factory
{
    protected $model = LlamadaSaliente::class;

    public function definition()
    {
        return [
            'fecha_hora' => $this->faker->dateTimeThisYear(),
            'user_id' => User::factory(),
            'paciente_id' => Paciente::factory(),
            'descripcion' => $this->faker->sentence,
            'planificado' => $this->faker->boolean,
            'aviso_id' => Aviso::factory(),
            'duracion' => $this->faker->numberBetween(30, 3600),
        ];
    }
}
