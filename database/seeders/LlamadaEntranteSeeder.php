<?php

namespace Database\Seeders;
use App\Models\LlamadaEntrante;

class LlamadaEntranteSeeder extends DatabaseSeeder
{
    public function run()
    {
        \App\Models\LlamadaEntrante::factory(10)->create();
    }
}
