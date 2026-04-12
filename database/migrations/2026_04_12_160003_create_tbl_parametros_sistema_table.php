<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_parametros_sistema', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_param_sist', 100)->unique();
            $table->string('nombre_param_sist', 255);
            $table->text('valor_param_sist')->nullable();
            $table->string('tipo_dato_param_sist', 50)->default('string');
            $table->string('descripcion_param_sist', 500)->nullable();
            $table->boolean('editable_param_sist')->nullable()->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_parametros_sistema');
    }
};
