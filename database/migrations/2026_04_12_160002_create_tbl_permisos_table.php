<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_permisos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_permiso', 255)->nullable();
            $table->string('nombre_permiso', 255);
            $table->string('modulo_permiso', 255);
            $table->string('descripcion_permiso', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_permisos');
    }
};
