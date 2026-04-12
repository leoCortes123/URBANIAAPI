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
        Schema::create('tbl_pais', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_pais', 255)->nullable();
            $table->string('nombre_pais', 255);
            $table->string('codigo_iso_pais', 255)->nullable();
            $table->boolean('estado_pais')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_pais');
    }
};
