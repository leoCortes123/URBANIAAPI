<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_departamentos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_dane_departam', 255)->nullable();
            $table->string('nombre_departam', 255);
            $table->boolean('estado_departam')->nullable();
            $table->foreignId('pais_id')->constrained('tbl_pais');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_departamentos');
    }
};
