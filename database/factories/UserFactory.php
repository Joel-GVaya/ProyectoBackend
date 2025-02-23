<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Zona;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'nombre' => substr($this->faker->name, 0, 100),
            'telefono' => $this->faker->phoneNumber,
            'correo' => $this->faker->unique()->safeEmail,
            'rol' => $this->faker->randomElement(['Administrador', 'Usuario']),
            'zona_id' => $this->faker->randomElement([1, 2, 3]), 
            'idiomas' => $this->faker->word,
            'fecha_contrato' => $this->faker->date(),
            'fecha_baja' => $this->faker->optional()->date(),
            'nombre_user' => substr($this->faker->userName, 0, 15),
            'password' => bcrypt('1234'),
        ];
    }
}

