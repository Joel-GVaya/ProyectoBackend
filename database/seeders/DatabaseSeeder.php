<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            ZonaSeeder::class,
            UserSeeder::class,
            PacienteSeeder::class,
            AvisoSeeder::class,
            LlamadaEntranteSeeder::class,
            LlamadaSalienteSeeder::class,
            ContactoSeeder::class
        ]);
    }
    
}
