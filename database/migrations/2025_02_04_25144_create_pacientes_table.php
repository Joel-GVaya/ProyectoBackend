<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->date('fecha_nac');
            $table->string('DNI', 15);
            $table->integer('num_sip');
            $table->string('telefono', 20);
            $table->string('correo', 100);
            $table->text('direccion');
            $table->string('ciudad', 50);
            $table->integer('cp');
            $table->foreignId('zona_id')->constrained('zonas')->onDelete('cascade');
            $table->string('sit_personal', 50);
            $table->string('sit_sanitaria', 50);
            $table->string('sit_habitaculo', 50);
            $table->string('sit_economica', 50);
            $table->boolean('autonomia');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}