<?php

namespace Database\Factories;
use App\Models\Aviso;
use App\Models\Operador;
use App\Models\Paciente;
use App\Models\Zona;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class AvisoFactory extends Factory
{
    protected $model = Aviso::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'tipo' => $this->faker->randomElement(['puntual', 'periodica']),
            'categoria' => $this->faker->randomElement(['aviso', 'seguimiento', 'ausencia', 'preventiva']),
            'descripcion' => $this->faker->sentence,
            'fecha_inicio' => $this->faker->date(),
            'frecuencia' => $this->faker->optional()->numberBetween(1, 30),
            'estado' => $this->faker->randomElement(['pendiente', 'completado', 'cancelado']),
            'zona_id' => Zona::factory(),
            'paciente_id' => Paciente::factory(),
        ];
    }
}

