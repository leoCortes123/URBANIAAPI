<?php

namespace Tests\Feature\Api;

use App\Models\TblUnidadesEstados;
use Database\Factories\TblUnidadesEstadosFactory;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class UnidadEstadoApiTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_it_lists_unidad_estados(): void
    {
        TblUnidadesEstadosFactory::new()->count(2)->create();

        $this->getJson('/api/unidades-estados')
            ->assertOk()
            ->assertJsonCount(2, 'data');
    }

    public function test_it_creates_updates_and_deletes_unidad_estado(): void
    {
        $this->postJson('/api/unidades-estados', [
            'nombre_unidesta' => 'Disponible',
            'codigo_unidesta' => 'D',
            'descripcion_unidesta' => null,
            'estado_unidesta' => true,
            'orden_unidesta' => 1,
        ])->assertCreated()
            ->assertJsonPath('data.nombre_unidesta', 'Disponible');

        /** @var TblUnidadesEstados $row */
        $row = TblUnidadesEstados::query()->where('nombre_unidesta', 'Disponible')->firstOrFail();

        $this->putJson("/api/unidades-estados/{$row->id}", [
            'nombre_unidesta' => 'Ocupado',
            'codigo_unidesta' => null,
            'descripcion_unidesta' => null,
            'estado_unidesta' => null,
            'orden_unidesta' => null,
        ])->assertOk();

        $this->deleteJson("/api/unidades-estados/{$row->id}")->assertNoContent();
    }

    public function test_it_returns_404_for_unknown_unidad_estado(): void
    {
        $this->getJson('/api/unidades-estados/999999')
            ->assertNotFound()
            ->assertJsonPath('message', 'Estado de unidad no encontrado.');
    }
}
