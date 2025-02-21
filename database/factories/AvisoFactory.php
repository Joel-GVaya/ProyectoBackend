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
            'tipo' => $this->faker->randomElement(['aviso', 'seguimiento', 'agenda']), // Ajuste para tipo
            'categoria' => $this->faker->randomElement(['medicación', 'especiales', 'alerta', 'emergencia', 'dolores', 'alta hospitalária', 'suspensión', 'retorno']),
            'descripcion' => $this->faker->sentence,
            'fecha_inicio' => $this->faker->date(),
            'frecuencia' => $this->faker->randomElement(['puntual', 'periodica']), // Ajuste para frecuencia
            'estado' => $this->faker->randomElement(['pendiente', 'completado', 'cancelado']),
            'zona_id' => $this->faker->randomElement([1, 2, 3]),
            'paciente_id' => Paciente::factory(),
        ];
    }
}

