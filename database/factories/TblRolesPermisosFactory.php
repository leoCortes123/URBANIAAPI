<?php

namespace Database\Factories;

use App\Models\TblRoles;
use App\Models\TblRolesPermisos;
use Database\Factories\TblPermisosFactory;
use Database\Factories\TblRolesFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TblRolesPermisos>
 */
class TblRolesPermisosFactory extends Factory
{
    protected $model = TblRolesPermisos::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rol_id' => TblRoles::query()->value('id') ?? TblRolesFactory::new()->create()->id,
            'permiso_id' => TblPermisosFactory::new()->create()->id,
        ];
    }
}
