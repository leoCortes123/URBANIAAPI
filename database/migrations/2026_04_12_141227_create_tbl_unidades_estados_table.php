<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_unidades_estados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_unidesta', 255);
            $table->string('codigo_unidesta', 255)->nullable();
            $table->string('descripcion_unidesta', 255)->nullable();
            $table->boolean('estado_unidesta')->nullable();
            $table->integer('orden_unidesta')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_unidades_estados');
    }
};
