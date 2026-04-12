<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TblAccesosLog
 * 
 * @property int $id
 * @property string|null $vehiculo_placa
 * @property Carbon|null $fecha_entrada
 * @property Carbon|null $fecha_salida
 * @property string|null $tipo_acceso
 * @property string|null $notas_acceso
 * @property int $conjunto_id
 * @property int|null $unidad_id
 * @property int|null $visitante_id
 * @property int|null $user_id
 * @property int $autoriza_user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class TblAccesosLog extends Model
{
	protected $table = 'tbl_accesos_log';

	protected $casts = [
		'fecha_entrada' => 'datetime',
		'fecha_salida' => 'datetime',
		'conjunto_id' => 'int',
		'unidad_id' => 'int',
		'visitante_id' => 'int',
		'user_id' => 'int',
		'autoriza_user_id' => 'int'
	];

	protected $fillable = [
		'vehiculo_placa',
		'fecha_entrada',
		'fecha_salida',
		'tipo_acceso',
		'notas_acceso',
		'conjunto_id',
		'unidad_id',
		'visitante_id',
		'user_id',
		'autoriza_user_id'
	];
}
