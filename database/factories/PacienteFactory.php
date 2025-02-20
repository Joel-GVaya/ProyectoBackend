<?php

namespace Database\Factories;
use App\Models\Paciente;
use App\Models\Zona;
use Illuminate\Database\Eloquent\Factories\Factory;

class PacienteFactory extends Factory
{
    protected $model = Paciente::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
            'fecha_nac' => $this->faker->date(),
            'DNI' => $this->faker->unique()->numerify('#########'),
            'num_sip' => $this->faker->numerify('#########'),
            'telefono' => $this->faker->phoneNumber,
            'correo' => $this->faker->unique()->safeEmail,
            'direccion' => $this->faker->address,
            'ciudad' => $this->faker->city,
            'cp' => $this->faker->randomNumber(5, true),
            'zona_id' => $this->faker->randomElement([1, 2, 3]), 
            'sit_personal' => $this->faker->word,
            'sit_sanitaria' => $this->faker->word,
            'sit_habitaculo' => $this->faker->word,
            'sit_economica' => $this->faker->word,
            'autonomia' => $this->faker->boolean,
        ];
    }
}