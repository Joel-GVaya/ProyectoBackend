<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvisosTable extends Migration
{
    public function up()
    {
        Schema::create('avisos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->default(1)->constrained('users')->onDelete('cascade');
            $table->enum('tipo', ['aviso', 'seguimiento', 'agenda', 'alarma']);
            $table->enum('categoria', ['medicación', 'especiales', 'alerta', 'emergencia', 'dolores', 'alta hospitalária', 'suspensión', 'retorno']);
            $table->enum('estado', ['pendiente', 'completado', 'cancelado'])->default('pendiente');
            $table->text('descripcion')->nullable();
            $table->timestamp('fecha_inicio')->useCurrent();
            $table->enum('frecuencia',['puntual', 'periodica'])->nullable();
            $table->foreignId('zona_id')->nullable()->constrained('zonas')->onDelete('set null');
            $table->foreignId('paciente_id')->nullable()->constrained('pacientes')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('avisos');
    }
}
