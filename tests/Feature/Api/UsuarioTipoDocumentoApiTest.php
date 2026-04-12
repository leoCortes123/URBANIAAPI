<?php

namespace Tests\Feature\Api;

use Database\Factories\TblUsersTiposDocumentosFactory;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class UsuarioTipoDocumentoApiTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_it_lists_users_tipos_documentos(): void
    {
        TblUsersTiposDocumentosFactory::new()->count(2)->create();

        $this->getJson('/api/users-tipos-documentos')
            ->assertOk()
            ->assertJsonCount(2, 'data');
    }

    public function test_it_returns_404_for_unknown(): void
    {
        $this->getJson('/api/users-tipos-documentos/999999')
            ->assertNotFound()
            ->assertJsonPath('message', 'Tipo de documento no encontrado.');
    }
}
