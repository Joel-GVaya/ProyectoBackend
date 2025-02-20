<?php

namespace Database\Seeders;
use App\Models\OperadorZona;

class OperadorZonaSeeder extends DatabaseSeeder
{
    public function run()
    {
        \App\Models\OperadorZona::factory(10)->create();
    }
}
