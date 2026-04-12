<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_unidades_ocupantes', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_ocupante', 50);
            $table->boolean('es_titular')->nullable();
            $table->timestamp('fecha_inicio');
            $table->timestamp('fecha_fin')->nullable();
            $table->boolean('estado_ocupante')->nullable();
            $table->text('observaciones')->nullable();
            $table->foreignId('unidad_id')->constrained('tbl_unidades')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('conjunto_id')->constrained('tbl_conjuntos')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_unidades_ocupantes');
    }
};
