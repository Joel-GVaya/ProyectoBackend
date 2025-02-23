<?php

namespace Database\Factories;

use App\Models\Aviso;
use App\Models\Paciente;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AvisoFactory extends Factory
{
    protected $model = Aviso::class;

    public function definition()
    {
        $tipo = $this->faker->randomElement(['avisos', 'seguimiento', 'agendas', 'alarma']);

        $categoria = null;
        if ($tipo === 'avisos') {
            $categoria = $this->faker->randomElement(['medicacion', 'especiales']);
        } elseif ($tipo === 'seguimiento') {
            $categoria = $this->faker->randomElement(['emergencias', 'luto', 'altas']);
        } elseif ($tipo === 'agendas') {
            $categoria = $this->faker->randomElement(['suspension', 'retorno']);
        }

        $frecuencia = $this->faker->randomElement(['puntual', 'periodico']);
        if ($frecuencia === 'periodico') {
            $dias_periodicos = $this->faker->numberBetween(1, 30);
            $frecuencia = "periodico-{$dias_periodicos}";
        }

        return [
            'user_id' => User::factory(),
            'tipo' => $tipo,
            'categoria' => $categoria,
            'descripcion' => $this->faker->sentence,
            'fecha_inicio' => $this->faker->dateTimeThisYear(),
            'frecuencia' => $frecuencia,
            'estado' => $this->faker->randomElement(['pendiente', 'completado', 'cancelado']),
            'zona_id' => $this->faker->randomElement([1, 2, 3]),
            'paciente_id' => Paciente::factory(),
        ];
    }
}
