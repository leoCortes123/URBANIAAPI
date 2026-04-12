<?php

namespace Tests\Feature\Api;

use App\Models\TblConjuntosTipos;
use Database\Factories\TblConjuntosTiposFactory;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ConjuntoTipoApiTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_it_lists_conjunto_tipos_with_pagination_metadata(): void
    {
        TblConjuntosTiposFactory::new()->count(2)->create();

        $response = $this->getJson('/api/conjuntos-tipos');

        $response->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'nombre_tipoconj',
                        'descripcion_tipoconj',
                        'estado_conest',
                    ],
                ],
                'links',
                'meta',
            ]);

        $response->assertJson(fn (AssertableJson $json) => $json
            ->has('data', 2)
            ->where('meta.per_page', 15)
            ->etc());
    }

    public function test_it_accepts_per_page_and_page_query_params(): void
    {
        TblConjuntosTiposFactory::new()->count(3)->create();

        $response = $this->getJson('/api/conjuntos-tipos?per_page=2&page=2');

        $response->assertOk()
            ->assertJson(fn (AssertableJson $json) => $json
                ->has('data', 1)
                ->where('meta.per_page', 2)
                ->where('meta.current_page', 2)
                ->etc());
    }

    public function test_it_returns_422_when_index_query_is_invalid(): void
    {
        $this->getJson('/api/conjuntos-tipos?per_page=101')
            ->assertUnprocessable();
    }

    public function test_it_shows_a_conjunto_tipo(): void
    {
        /** @var TblConjuntosTipos $row */
        $row = TblConjuntosTiposFactory::new()->create([
            'nombre_tipoconj' => 'Residencial',
        ]);

        $this->getJson("/api/conjuntos-tipos/{$row->id}")
            ->assertOk()
            ->assertJsonPath('data.id', $row->id)
            ->assertJsonPath('data.nombre_tipoconj', 'Residencial');
    }

    public function test_it_returns_404_when_showing_unknown_conjunto_tipo(): void
    {
        $this->getJson('/api/conjuntos-tipos/999999')
            ->assertNotFound()
            ->assertJsonPath('message', 'Tipo de conjunto no encontrado.');
    }

    public function test_it_creates_a_conjunto_tipo(): void
    {
        $payload = [
            'nombre_tipoconj' => 'Mixto',
            'descripcion_tipoconj' => 'Desc',
            'estado_conest' => true,
        ];

        $response = $this->postJson('/api/conjuntos-tipos', $payload);

        $response->assertCreated()
            ->assertJsonPath('data.nombre_tipoconj', 'Mixto');

        $this->assertDatabaseHas('tbl_conjuntos_tipos', [
            'nombre_tipoconj' => 'Mixto',
        ]);
    }

    public function test_it_returns_422_when_store_payload_is_invalid(): void
    {
        $this->postJson('/api/conjuntos-tipos', [
            'descripcion_tipoconj' => 'x',
        ])->assertUnprocessable();
    }

    public function test_it_updates_a_conjunto_tipo(): void
    {
        /** @var TblConjuntosTipos $row */
        $row = TblConjuntosTiposFactory::new()->create(['nombre_tipoconj' => 'Original']);

        $response = $this->putJson("/api/conjuntos-tipos/{$row->id}", [
            'nombre_tipoconj' => 'Actualizado',
            'descripcion_tipoconj' => null,
            'estado_conest' => null,
        ]);

        $response->assertOk()
            ->assertJsonPath('data.nombre_tipoconj', 'Actualizado');

        $this->assertDatabaseHas('tbl_conjuntos_tipos', [
            'id' => $row->id,
            'nombre_tipoconj' => 'Actualizado',
        ]);
    }

    public function test_it_returns_404_when_updating_unknown_conjunto_tipo(): void
    {
        $this->putJson('/api/conjuntos-tipos/999999', [
            'nombre_tipoconj' => 'Nadie',
            'descripcion_tipoconj' => null,
            'estado_conest' => null,
        ])->assertNotFound()
            ->assertJsonPath('message', 'Tipo de conjunto no encontrado.');
    }

    public function test_it_deletes_a_conjunto_tipo(): void
    {
        /** @var TblConjuntosTipos $row */
        $row = TblConjuntosTiposFactory::new()->create();

        $this->deleteJson("/api/conjuntos-tipos/{$row->id}")
            ->assertNoContent();

        $this->assertDatabaseMissing('tbl_conjuntos_tipos', ['id' => $row->id]);
    }

    public function test_it_returns_404_when_deleting_unknown_conjunto_tipo(): void
    {
        $this->deleteJson('/api/conjuntos-tipos/999999')
            ->assertNotFound()
            ->assertJsonPath('message', 'Tipo de conjunto no encontrado.');
    }
}
