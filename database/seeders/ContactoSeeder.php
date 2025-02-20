<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contacto;
use App\Models\Paciente;

class ContactoSeeder extends Seeder
{
    public function run()
    {
        Paciente::all()->each(function ($paciente) {
            Contacto::factory()->count(3)->create(['paciente_id' => $paciente->id]);
        });
    }
}
