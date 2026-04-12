<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TblAuditoriaLogs
 * 
 * @property int $id
 * @property string $accion
 * @property string $tabla_afectada
 * @property int $registro_id
 * @property string|null $valor_anterior
 * @property string|null $valor_nuevo
 * @property string|null $ip_dispositivo
 * @property string|null $user_agent
 * @property Carbon|null $fecha_hora
 * @property int|null $conjunto_id
 * @property int $user_id
 *
 * @package App\Models
 */
class TblAuditoriaLogs extends Model
{
	protected $table = 'tbl_auditoria_logs';
	public $timestamps = false;

	protected $casts = [
		'registro_id' => 'int',
		'valor_anterior' => 'binary',
		'valor_nuevo' => 'binary',
		'fecha_hora' => 'datetime',
		'conjunto_id' => 'int',
		'user_id' => 'int'
	];

	protected $fillable = [
		'accion',
		'tabla_afectada',
		'registro_id',
		'valor_anterior',
		'valor_nuevo',
		'ip_dispositivo',
		'user_agent',
		'fecha_hora',
		'conjunto_id',
		'user_id'
	];
}
