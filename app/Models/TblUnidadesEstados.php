<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TblUnidadesEstados
 * 
 * @property int $id
 * @property string $nombre_unidesta
 * @property string|null $codigo_unidesta
 * @property string|null $descripcion_unidesta
 * @property bool|null $estado_unidesta
 * @property int|null $orden_unidesta
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class TblUnidadesEstados extends Model
{
	protected $table = 'tbl_unidades_estados';

	protected $casts = [
		'estado_unidesta' => 'bool',
		'orden_unidesta' => 'int'
	];

	protected $fillable = [
		'nombre_unidesta',
		'codigo_unidesta',
		'descripcion_unidesta',
		'estado_unidesta',
		'orden_unidesta'
	];
}
