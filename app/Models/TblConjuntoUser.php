<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TblConjuntoUser
 * 
 * @property int $id
 * @property int $user_id
 * @property int $conjunto_id
 * @property Carbon|null $fecha_vinculacion
 * @property bool|null $estado_conjuser
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class TblConjuntoUser extends Model
{
	protected $table = 'tbl_conjunto_user';

	protected $casts = [
		'user_id' => 'int',
		'conjunto_id' => 'int',
		'fecha_vinculacion' => 'datetime',
		'estado_conjuser' => 'bool'
	];

	protected $fillable = [
		'user_id',
		'conjunto_id',
		'fecha_vinculacion',
		'estado_conjuser'
	];
}
