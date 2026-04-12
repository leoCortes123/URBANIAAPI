<?php

namespace Tests\Feature\Api;

use App\Models\TblPais;
use Database\Factories\TblPaisFactory;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class PaisApiTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_it_lists_paises_with_pagination_metadata(): void
    {
        TblPaisFactory::new()->count(2)->create();

        $response = $this->getJson('/api/paises');

        $response->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'codigo_pais',
                        'nombre_pais',
                        'codigo_iso_pais',
                        'estado_pais',
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
        TblPaisFactory::new()->count(3)->create();

        $response = $this->getJson('/api/paises?per_page=2&page=2');

        $response->assertOk()
            ->assertJson(fn (AssertableJson $json) => $json
                ->has('data', 1)
                ->where('meta.per_page', 2)
                ->where('meta.current_page', 2)
                ->etc());
    }

    public function test_it_returns_422_when_index_query_is_invalid(): void
    {
        $this->getJson('/api/paises?per_page=101')
            ->assertUnprocessable();
    }

    public function test_it_shows_a_pais(): void
    {
        /** @var TblPais $row */
        $row = TblPaisFactory::new()->create([
            'nombre_pais' => 'Perú',
            'codigo_iso_pais' => 'PE',
        ]);

        $this->getJson("/api/paises/{$row->id}")
            ->assertOk()
            ->assertJsonPath('data.id', $row->id)
            ->assertJsonPath('data.nombre_pais', 'Perú')
            ->assertJsonPath('data.codigo_iso_pais', 'PE');
    }

    public function test_it_returns_404_when_showing_unknown_pais(): void
    {
        $this->getJson('/api/paises/999999')
            ->assertNotFound()
            ->assertJsonPath('message', 'País no encontrado.');
    }

    public function test_it_creates_a_pais(): void
    {
        $payload = [
            'nombre_pais' => 'Chile',
            'codigo_pais' => '56',
            'codigo_iso_pais' => 'CL',
            'estado_pais' => true,
        ];

        $response = $this->postJson('/api/paises', $payload);

        $response->assertCreated()
            ->assertJsonPath('data.nombre_pais', 'Chile')
            ->assertJsonPath('data.codigo_iso_pais', 'CL');

        $this->assertDatabaseHas('tbl_pais', [
            'nombre_pais' => 'Chile',
            'codigo_iso_pais' => 'CL',
        ]);
    }

    public function test_it_returns_422_when_store_payload_is_invalid(): void
    {
        $this->postJson('/api/paises', [
            'codigo_pais' => 'x',
        ])->assertUnprocessable();
    }

    public function test_it_updates_a_pais(): void
    {
        /** @var TblPais $row */
        $row = TblPaisFactory::new()->create(['nombre_pais' => 'Original']);

        $response = $this->putJson("/api/paises/{$row->id}", [
            'nombre_pais' => 'Actualizado',
            'codigo_pais' => null,
            'codigo_iso_pais' => null,
            'estado_pais' => null,
        ]);

        $response->assertOk()
            ->assertJsonPath('data.nombre_pais', 'Actualizado');

        $this->assertDatabaseHas('tbl_pais', [
            'id' => $row->id,
            'nombre_pais' => 'Actualizado',
        ]);
    }

    public function test_it_returns_404_when_updating_unknown_pais(): void
    {
        $this->putJson('/api/paises/999999', [
            'nombre_pais' => 'Nadie',
            'codigo_pais' => null,
            'codigo_iso_pais' => null,
            'estado_pais' => null,
        ])->assertNotFound()
            ->assertJsonPath('message', 'País no encontrado.');
    }

    public function test_it_deletes_a_pais(): void
    {
        /** @var TblPais $row */
        $row = TblPaisFactory::new()->create();

        $this->deleteJson("/api/paises/{$row->id}")
            ->assertNoContent();

        $this->assertDatabaseMissing('tbl_pais', ['id' => $row->id]);
    }

    public function test_it_returns_404_when_deleting_unknown_pais(): void
    {
        $this->deleteJson('/api/paises/999999')
            ->assertNotFound()
            ->assertJsonPath('message', 'País no encontrado.');
    }
}
