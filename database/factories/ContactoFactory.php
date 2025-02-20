<?php

namespace Database\Factories;

use App\Models\Contacto;
use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactoFactory extends Factory
{
    protected $model = Contacto::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'telefono' => $this->faker->phoneNumber(),
            'correo' => $this->faker->unique()->safeEmail(),
            'relacion' => $this->faker->randomElement(['Familiar', 'Amigo', 'Doctor', 'Otro']),
            'paciente_id' => Paciente::factory(),
        ];
    }
}