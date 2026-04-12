<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('users')) {
            return;
        }

        Schema::table('users', function (Blueprint $table) {
            if (! Schema::hasColumn('users', 'documento')) {
                $table->string('documento', 50)->nullable();
            }
            if (! Schema::hasColumn('users', 'telefono')) {
                $table->string('telefono', 30)->nullable();
            }
            if (! Schema::hasColumn('users', 'foto_url')) {
                $table->string('foto_url', 500)->nullable();
            }
            if (! Schema::hasColumn('users', 'estado')) {
                $table->boolean('estado')->nullable();
            }
            if (! Schema::hasColumn('users', 'ultimo_acceso')) {
                $table->timestamp('ultimo_acceso')->nullable();
            }
            if (! Schema::hasColumn('users', 'tipo_documento_id')) {
                $table->foreignId('tipo_documento_id')->nullable()->constrained('tbl_users_tipos_documentos');
            }
            if (! Schema::hasColumn('users', 'rol_id')) {
                $table->foreignId('rol_id')->nullable()->constrained('tbl_roles');
            }
            if (! Schema::hasColumn('users', 'users_estado_id')) {
                $table->foreignId('users_estado_id')->nullable()->constrained('tbl_users_estados');
            }
            if (! Schema::hasColumn('users', 'deleted_at')) {
                $table->softDeletes();
            }
        });
    }

    public function down(): void
    {
        if (! Schema::hasTable('users')) {
            return;
        }

        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'tipo_documento_id')) {
                $table->dropForeign(['tipo_documento_id']);
            }
            if (Schema::hasColumn('users', 'rol_id')) {
                $table->dropForeign(['rol_id']);
            }
            if (Schema::hasColumn('users', 'users_estado_id')) {
                $table->dropForeign(['users_estado_id']);
            }
            $columns = [
                'documento',
                'telefono',
                'foto_url',
                'estado',
                'ultimo_acceso',
                'tipo_documento_id',
                'rol_id',
                'users_estado_id',
                'deleted_at',
            ];
            foreach ($columns as $column) {
                if (Schema::hasColumn('users', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
