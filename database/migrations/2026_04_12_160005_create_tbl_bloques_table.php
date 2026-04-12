<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_bloques', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_bloque', 255);
            $table->string('descripcion_bloque', 500)->nullable();
            $table->integer('numero_unidades_bloque')->nullable();
            $table->integer('orden_bloque')->nullable();
            $table->boolean('estado_bloque')->nullable();
            $table->foreignId('conjunto_id')->constrained('tbl_conjuntos');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_bloques');
    }
};
