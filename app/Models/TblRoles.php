<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TblRoles
 * 
 * @property int $id
 * @property string $nombre_rol
 * @property string $codigo_rol
 * @property string|null $descripcion_rol
 * @property int|null $nivel_rol
 * @property bool|null $estado_rol
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class TblRoles extends Model
{
	protected $table = 'tbl_roles';

	protected $casts = [
		'nivel_rol' => 'int',
		'estado_rol' => 'bool'
	];

	protected $fillable = [
		'nombre_rol',
		'codigo_rol',
		'descripcion_rol',
		'nivel_rol',
		'estado_rol'
	];
}
