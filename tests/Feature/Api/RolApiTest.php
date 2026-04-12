<?php

namespace Tests\Feature\Api;

use Database\Factories\TblRolesFactory;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class RolApiTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_it_lists_roles(): void
    {
        TblRolesFactory::new()->count(2)->create();

        $this->getJson('/api/roles')
            ->assertOk()
            ->assertJsonCount(2, 'data');
    }

    public function test_it_returns_404_for_unknown(): void
    {
        $this->getJson('/api/roles/999999')
            ->assertNotFound()
            ->assertJsonPath('message', 'Rol no encontrado.');
    }
}
