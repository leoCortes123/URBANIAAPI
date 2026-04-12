<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_unidades', function (Blueprint $table) {
            $table->id();
            $table->string('numero_unidad', 255);
            $table->string('codigo_unidad', 255)->nullable();
            $table->integer('piso_unidad')->nullable();
            $table->decimal('area_m2_unidad', 12, 2)->nullable();
            $table->decimal('coeficiente_unidad', 12, 6)->nullable();
            $table->boolean('estado_unidad')->nullable();
            $table->foreignId('bloque_id')->constrained('tbl_bloques');
            $table->foreignId('conjunto_id')->constrained('tbl_conjuntos');
            $table->foreignId('estado_ocupacion_id')->constrained('tbl_unidades_estados');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_unidades');
    }
};
