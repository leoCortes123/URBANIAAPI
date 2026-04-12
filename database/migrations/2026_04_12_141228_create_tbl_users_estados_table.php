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
        Schema::create('tbl_users_estados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_useresta', 255);
            $table->string('codigo_useresta', 255)->nullable();
            $table->string('descripcion_useresta', 255)->nullable();
            $table->integer('orden_useresta')->nullable();
            $table->boolean('estado_useresta')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_users_estados');
    }
};
