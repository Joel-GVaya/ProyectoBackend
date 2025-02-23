<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class CreateZonasTable extends Migration
{
    public function up()
    {
        Schema::create('zonas', function (Blueprint $table) {
            $table->id(); 
            $table->string('nombre', 50)->unique(); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('zonas');
    }
}
