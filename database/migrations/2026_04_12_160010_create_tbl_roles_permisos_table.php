<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_roles_permisos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rol_id')->constrained('tbl_roles')->cascadeOnDelete();
            $table->foreignId('permiso_id')->constrained('tbl_permisos')->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['rol_id', 'permiso_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_roles_permisos');
    }
};
