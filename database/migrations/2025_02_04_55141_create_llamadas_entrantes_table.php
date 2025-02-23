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
            $table->boolean('emergencia');
            $table->enum('subtipo', [
                'Emergencias sociales',
                'Emergencias sanitarias',
                'Crisis de soledad o angustia',
                'Alarma sin respuesta',
                'Otro tipo de llamada',
                'Notificar ausencias o retornos',
                'Modificar datos personales',
                'Llamadas accidentales',
                'Solicitud de informacion',
                'Sugerencias, quejas o reclamaciones',
                'Llamadas sociales',
                'Registrar citas medicas',
            ]);
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
