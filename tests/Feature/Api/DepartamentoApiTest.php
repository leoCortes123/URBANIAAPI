<?php

namespace Tests\Feature\Api;

use App\Models\TblPais;
use Database\Factories\TblDepartamentosFactory;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class DepartamentoApiTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_it_lists_departamentos(): void
    {
        TblDepartamentosFactory::new()->count(2)->create();

        $this->getJson('/api/departamentos')->assertOk()
            ->assertJsonStructure(['data', 'links', 'meta']);
    }

    public function test_it_creates_a_departamento(): void
    {
        $pais = TblPais::query()->create([
            'nombre_pais' => 'Testland',
        ]);

        $this->postJson('/api/departamentos', [
            'nombre_departam' => 'Cundinamarca',
            'pais_id' => $pais->id,
            'estado_departam' => true,
        ])->assertCreated()
            ->assertJsonPath('data.nombre_departam', 'Cundinamarca');

        $this->assertDatabaseHas('tbl_departamentos', [
            'nombre_departam' => 'Cundinamarca',
            'pais_id' => $pais->id,
        ]);
    }

    public function test_it_returns_404_for_unknown_departamento(): void
    {
        $this->getJson('/api/departamentos/99999')
            ->assertNotFound()
            ->assertJsonPath('message', 'Departamento no encontrado.');
    }
}
