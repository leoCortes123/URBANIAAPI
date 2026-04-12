<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_conjuntos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_conjunto', 255);
            $table->string('nit_conjunto', 255);
            $table->string('direccion_conjunto', 255)->nullable();
            $table->string('telefono_conjunto', 255)->nullable();
            $table->integer('estrato_conjunto')->nullable();
            $table->decimal('coeficiente_total_conjunto', 12, 4)->nullable();
            $table->text('datos_bancarios_conjunto')->nullable();
            $table->string('reglamento_url_conjunto', 500)->nullable();
            $table->string('logo_url_conjunto', 500)->nullable();
            $table->string('portada_url_conjunto', 500)->nullable();
            $table->text('galeria_conjunto')->nullable();
            $table->boolean('estado_conjunto')->nullable();
            $table->foreignId('conjunto_tipo_id')->constrained('tbl_conjuntos_tipos');
            $table->foreignId('conjunto_estado_id')->constrained('tbl_conjuntos_estados');
            $table->foreignId('municipio_id')->constrained('tbl_municipios');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_conjuntos');
    }
};
