<?php

namespace Database\Seeders;
use App\Models\Zona;

class ZonaSeeder extends DatabaseSeeder
{
    public function run()
    {
        \App\Models\Zona::factory(10)->create();
    }
}
