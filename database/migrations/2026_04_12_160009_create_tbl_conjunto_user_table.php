<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_conjunto_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('conjunto_id')->constrained('tbl_conjuntos')->cascadeOnDelete();
            $table->timestamp('fecha_vinculacion')->nullable();
            $table->boolean('estado_conjuser')->nullable();
            $table->timestamps();

            $table->unique(['user_id', 'conjunto_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_conjunto_user');
    }
};
