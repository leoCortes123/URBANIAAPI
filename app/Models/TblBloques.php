<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TblBloques
 * 
 * @property int $id
 * @property string $nombre_bloque
 * @property string|null $descripcion_bloque
 * @property int|null $numero_unidades_bloque
 * @property int|null $orden_bloque
 * @property bool|null $estado_bloque
 * @property int $conjunto_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class TblBloques extends Model
{
	protected $table = 'tbl_bloques';

	protected $casts = [
		'numero_unidades_bloque' => 'int',
		'orden_bloque' => 'int',
		'estado_bloque' => 'bool',
		'conjunto_id' => 'int'
	];

	protected $fillable = [
		'nombre_bloque',
		'descripcion_bloque',
		'numero_unidades_bloque',
		'orden_bloque',
		'estado_bloque',
		'conjunto_id'
	];
}
