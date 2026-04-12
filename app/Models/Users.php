<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Users
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property string $documento
 * @property string|null $telefono
 * @property string|null $foto_url
 * @property bool|null $estado
 * @property Carbon|null $ultimo_acceso
 * @property int $tipo_documento_id
 * @property int $rol_id
 * @property int $users_estado_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class Users extends Model
{
	use SoftDeletes;
	protected $table = 'users';

	protected $casts = [
		'email_verified_at' => 'datetime',
		'estado' => 'bool',
		'ultimo_acceso' => 'datetime',
		'tipo_documento_id' => 'int',
		'rol_id' => 'int',
		'users_estado_id' => 'int',
		'deleted_at' => 'datetime',
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'email_verified_at',
		'password',
		'remember_token',
		'documento',
		'telefono',
		'foto_url',
		'estado',
		'ultimo_acceso',
		'tipo_documento_id',
		'rol_id',
		'users_estado_id'
	];
}
