<?php

namespace Tests\Feature\Api;

use Database\Factories\TblCategoriasConceptosFactory;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class CategoriaConceptoApiTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_it_lists_categorias_conceptos(): void
    {
        TblCategoriasConceptosFactory::new()->count(2)->create();

        $this->getJson('/api/categorias-conceptos')
            ->assertOk()
            ->assertJsonCount(2, 'data');
    }

    public function test_it_returns_404_for_unknown(): void
    {
        $this->getJson('/api/categorias-conceptos/999999')
            ->assertNotFound()
            ->assertJsonPath('message', 'Categoría de concepto no encontrada.');
    }
}
