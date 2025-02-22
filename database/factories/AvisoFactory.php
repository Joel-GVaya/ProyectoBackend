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
        $tipo = $this->faker->randomElement(['avisos', 'seguimiento', 'agendas', 'alarma']);

        $categoria = $tipo !== 'alarma' ? $this->faker->randomElement(['medicacion', 'especiales', 'emergencias', 'luto', 'altas', 'suspension', 'retorno']) : null;

        return [
            'user_id' => User::factory(),
            'tipo' => $tipo,
            'categoria' => $categoria,
            'descripcion' => $this->faker->sentence,
            'fecha_inicio' => $this->faker->date(),
            'frecuencia' => $this->faker->randomElement(['puntual', 'periodica']),
            'estado' => $this->faker->randomElement(['pendiente', 'completado', 'cancelado']),
            'zona_id' => $this->faker->randomElement([1, 2, 3]),
            'paciente_id' => Paciente::factory(),
        ];
    }
}
