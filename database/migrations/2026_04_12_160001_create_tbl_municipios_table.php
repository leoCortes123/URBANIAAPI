<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_municipios', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_dane_municipi', 255)->nullable();
            $table->string('nombre_municipi', 255);
            $table->boolean('estado_municipi')->nullable();
            $table->foreignId('departamento_id')->constrained('tbl_departamentos');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_municipios');
    }
};
