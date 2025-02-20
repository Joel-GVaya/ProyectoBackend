<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Zona;

class ZonaSeeder extends Seeder
{
    public function run()
    {
        $zonas = [
            ['id' => 1, 'nombre' => 'Alicante'],
            ['id' => 2, 'nombre' => 'Valencia'],
            ['id' => 3, 'nombre' => 'Castellón'],
        ];

        foreach ($zonas as $zona) {
            Zona::updateOrCreate(['id' => $zona['id']], ['nombre' => $zona['nombre']]);
        }
    }
}
