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
        Schema::create('tbl_users_tipos_documentos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_tipodocu', 255);
            $table->string('codigo_tipodocu', 255)->nullable();
            $table->boolean('estado_tipodocu')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_users_tipos_documentos');
    }
};
