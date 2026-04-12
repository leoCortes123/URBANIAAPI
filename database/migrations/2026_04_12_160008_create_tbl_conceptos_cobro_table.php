<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_conceptos_cobro', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categoria_concepto_id')->constrained('tbl_categorias_conceptos');
            $table->string('codigo_concepto', 100);
            $table->string('nombre_concepto', 255);
            $table->string('descripcion_concepto', 500)->nullable();
            $table->decimal('valor_base_concepto', 14, 2)->nullable();
            $table->string('periodicidad_concepto', 50)->nullable();
            $table->boolean('activo_concepto')->nullable()->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_conceptos_cobro');
    }
};
