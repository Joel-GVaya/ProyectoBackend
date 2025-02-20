<?php

namespace Database\Seeders;
use App\Models\LlamadaSaliente;

class LlamadaSalienteSeeder extends DatabaseSeeder
{
    public function run()
    {
        \App\Models\LlamadaSaliente::factory(10)->create();
    }
}

