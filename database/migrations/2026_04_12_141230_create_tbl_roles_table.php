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
        Schema::create('tbl_roles', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_rol', 255);
            $table->string('codigo_rol', 255);
            $table->string('descripcion_rol', 255)->nullable();
            $table->integer('nivel_rol')->nullable();
            $table->boolean('estado_rol')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_roles');
    }
};
