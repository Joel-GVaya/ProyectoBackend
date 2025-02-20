<?php

namespace Database\Seeders;
use App\Models\Aviso;

class AvisoSeeder extends DatabaseSeeder
{
    public function run()
    {
        \App\Models\Aviso::factory(10)->create();
    }
}

