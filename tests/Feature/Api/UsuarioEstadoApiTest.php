<?php

namespace Tests\Feature\Api;

use Database\Factories\TblUsersEstadosFactory;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class UsuarioEstadoApiTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_it_lists_users_estados(): void
    {
        TblUsersEstadosFactory::new()->count(2)->create();

        $this->getJson('/api/users-estados')
            ->assertOk()
            ->assertJsonCount(2, 'data');
    }

    public function test_it_returns_404_for_unknown(): void
    {
        $this->getJson('/api/users-estados/999999')
            ->assertNotFound()
            ->assertJsonPath('message', 'Estado de usuario no encontrado.');
    }
}
