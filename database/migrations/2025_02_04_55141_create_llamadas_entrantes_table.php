<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLlamadasEntrantesTable extends Migration
{
    public function up()
    {
        Schema::create('llamadas_entrantes', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha_hora');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('paciente_id')->nullable()->constrained('pacientes')->onDelete('set null');
            $table->string('tipo');
            $table->string('subtipo');
            $table->text('descripcion');
            $table->integer('duracion')->nullable()->comment('Duración de la llamada en segundos');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('llamadas_entrantes');
    }
}
