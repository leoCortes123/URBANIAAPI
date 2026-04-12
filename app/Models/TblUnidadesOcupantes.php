<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TblUnidadesOcupantes
 * 
 * @property int $id
 * @property string $tipo_ocupante
 * @property bool|null $es_titular
 * @property Carbon $fecha_inicio
 * @property Carbon|null $fecha_fin
 * @property bool|null $estado_ocupante
 * @property string|null $observaciones
 * @property int $unidad_id
 * @property int $user_id
 * @property int $conjunto_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class TblUnidadesOcupantes extends Model
{
	protected $table = 'tbl_unidades_ocupantes';

	protected $casts = [
		'es_titular' => 'bool',
		'fecha_inicio' => 'datetime',
		'fecha_fin' => 'datetime',
		'estado_ocupante' => 'bool',
		'unidad_id' => 'int',
		'user_id' => 'int',
		'conjunto_id' => 'int'
	];

	protected $fillable = [
		'tipo_ocupante',
		'es_titular',
		'fecha_inicio',
		'fecha_fin',
		'estado_ocupante',
		'observaciones',
		'unidad_id',
		'user_id',
		'conjunto_id'
	];
}
