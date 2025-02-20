<?php

namespace Database\Seeders;
use App\Models\Operador;

class UserSeeder extends DatabaseSeeder
{
    public function run()
    {
        \App\Models\User::factory(10)->create();
    }
}
