<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLlamadasSalientesTable extends Migration
{
    public function up()
    {
        Schema::create('llamadas_salientes', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha_hora');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('paciente_id')->constrained('pacientes')->onDelete('cascade');
            $table->string('descripcion');
            $table->boolean('planificado');
            $table->foreignId('aviso_id')->nullable()->constrained('avisos')->onDelete('set null');
            $table->integer('duracion')->nullable()->comment('Duración de la llamada en segundos');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('llamadas_salientes');
    }
}
