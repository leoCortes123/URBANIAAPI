<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TblUsersEstados
 * 
 * @property int $id
 * @property string $nombre_useresta
 * @property string|null $codigo_useresta
 * @property string|null $descripcion_useresta
 * @property int|null $orden_useresta
 * @property bool|null $estado_useresta
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class TblUsersEstados extends Model
{
	protected $table = 'tbl_users_estados';

	protected $casts = [
		'orden_useresta' => 'int',
		'estado_useresta' => 'bool'
	];

	protected $fillable = [
		'nombre_useresta',
		'codigo_useresta',
		'descripcion_useresta',
		'orden_useresta',
		'estado_useresta'
	];
}
