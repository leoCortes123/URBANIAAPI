<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TblUnidades
 * 
 * @property int $id
 * @property string $numero_unidad
 * @property string|null $codigo_unidad
 * @property int|null $piso_unidad
 * @property float|null $area_m2_unidad
 * @property float|null $coeficiente_unidad
 * @property bool|null $estado_unidad
 * @property int $bloque_id
 * @property int $conjunto_id
 * @property int $estado_ocupacion_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class TblUnidades extends Model
{
	protected $table = 'tbl_unidades';

	protected $casts = [
		'piso_unidad' => 'int',
		'area_m2_unidad' => 'float',
		'coeficiente_unidad' => 'float',
		'estado_unidad' => 'bool',
		'bloque_id' => 'int',
		'conjunto_id' => 'int',
		'estado_ocupacion_id' => 'int'
	];

	protected $fillable = [
		'numero_unidad',
		'codigo_unidad',
		'piso_unidad',
		'area_m2_unidad',
		'coeficiente_unidad',
		'estado_unidad',
		'bloque_id',
		'conjunto_id',
		'estado_ocupacion_id'
	];
}
