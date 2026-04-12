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
        Schema::create('tbl_conjuntos_estados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_conjesta', 255);
            $table->string('descripcion_conjesta', 255)->nullable();
            $table->integer('orden_conjesta')->nullable();
            $table->boolean('estado_conjesta')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_conjuntos_estados');
    }
};
