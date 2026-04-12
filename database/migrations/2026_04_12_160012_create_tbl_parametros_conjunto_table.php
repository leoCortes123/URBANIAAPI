<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_parametros_conjunto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parametro_sistema_id')->constrained('tbl_parametros_sistema')->cascadeOnDelete();
            $table->foreignId('conjunto_id')->constrained('tbl_conjuntos')->cascadeOnDelete();
            $table->text('valor_param_conjunto')->nullable();
            $table->timestamps();

            $table->unique(['parametro_sistema_id', 'conjunto_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_parametros_conjunto');
    }
};
