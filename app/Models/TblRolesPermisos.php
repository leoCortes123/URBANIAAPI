<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TblRolesPermisos
 * 
 * @property int $id
 * @property int $rol_id
 * @property int $permiso_id
 * @property Carbon|null $created_at
 *
 * @package App\Models
 */
class TblRolesPermisos extends Model
{
	protected $table = 'tbl_roles_permisos';

	protected $casts = [
		'rol_id' => 'int',
		'permiso_id' => 'int'
	];

	protected $fillable = [
		'rol_id',
		'permiso_id'
	];
}
