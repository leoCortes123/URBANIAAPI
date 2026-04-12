<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TblPermisos
 * 
 * @property int $id
 * @property string|null $codigo_permiso
 * @property string $nombre_permiso
 * @property string $modulo_permiso
 * @property string|null $descripcion_permiso
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class TblPermisos extends Model
{
	protected $table = 'tbl_permisos';

	protected $fillable = [
		'codigo_permiso',
		'nombre_permiso',
		'modulo_permiso',
		'descripcion_permiso'
	];
}
