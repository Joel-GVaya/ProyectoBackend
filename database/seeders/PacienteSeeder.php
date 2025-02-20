<?php

namespace Database\Seeders;
use App\Models\Paciente;

class PacienteSeeder extends DatabaseSeeder
{
    public function run()
    {
        \App\Models\Paciente::factory(10)->create();
    }
}
