<?php

namespace Tests\Feature\Api;

use App\Models\TblConjuntosEstados;
use Database\Factories\TblConjuntosEstadosFactory;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ConjuntoEstadoApiTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_it_lists_conjunto_estados_with_pagination_metadata(): void
    {
        TblConjuntosEstadosFactory::new()->count(2)->create();

        $this->getJson('/api/conjuntos-estados')
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'nombre_conjesta',
                        'descripcion_conjesta',
                        'orden_conjesta',
                        'estado_conjesta',
                    ],
                ],
                'links',
                'meta',
            ])
            ->assertJson(fn (AssertableJson $json) => $json
                ->has('data', 2)
                ->where('meta.per_page', 15)
                ->etc());
    }

    public function test_it_returns_422_when_index_query_is_invalid(): void
    {
        $this->getJson('/api/conjuntos-estados?per_page=101')
            ->assertUnprocessable();
    }

    public function test_it_shows_a_conjunto_estado(): void
    {
        /** @var TblConjuntosEstados $row */
        $row = TblConjuntosEstadosFactory::new()->create(['nombre_conjesta' => 'Activo']);

        $this->getJson("/api/conjuntos-estados/{$row->id}")
            ->assertOk()
            ->assertJsonPath('data.nombre_conjesta', 'Activo');
    }

    public function test_it_returns_404_when_showing_unknown_conjunto_estado(): void
    {
        $this->getJson('/api/conjuntos-estados/999999')
            ->assertNotFound()
            ->assertJsonPath('message', 'Estado de conjunto no encontrado.');
    }

    public function test_it_creates_a_conjunto_estado(): void
    {
        $this->postJson('/api/conjuntos-estados', [
            'nombre_conjesta' => 'Borrador',
            'descripcion_conjesta' => null,
            'orden_conjesta' => 1,
            'estado_conjesta' => true,
        ])->assertCreated()
            ->assertJsonPath('data.nombre_conjesta', 'Borrador');
    }

    public function test_it_updates_a_conjunto_estado(): void
    {
        /** @var TblConjuntosEstados $row */
        $row = TblConjuntosEstadosFactory::new()->create(['nombre_conjesta' => 'Original']);

        $this->putJson("/api/conjuntos-estados/{$row->id}", [
            'nombre_conjesta' => 'Actualizado',
            'descripcion_conjesta' => null,
            'orden_conjesta' => null,
            'estado_conjesta' => null,
        ])->assertOk()
            ->assertJsonPath('data.nombre_conjesta', 'Actualizado');
    }

    public function test_it_deletes_a_conjunto_estado(): void
    {
        /** @var TblConjuntosEstados $row */
        $row = TblConjuntosEstadosFactory::new()->create();

        $this->deleteJson("/api/conjuntos-estados/{$row->id}")
            ->assertNoContent();

        $this->assertDatabaseMissing('tbl_conjuntos_estados', ['id' => $row->id]);
    }
}
