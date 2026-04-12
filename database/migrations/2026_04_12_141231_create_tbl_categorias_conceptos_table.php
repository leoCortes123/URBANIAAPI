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
        Schema::create('tbl_categorias_conceptos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_catconc', 255);
            $table->string('codigo_catconc', 255)->nullable();
            $table->string('descripcion_catconc', 255)->nullable();
            $table->integer('orden_catconc')->nullable();
            $table->boolean('estado_catconc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_categorias_conceptos');
    }
};
