<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TblConjuntosEstados
 * 
 * @property int $id
 * @property string $nombre_conjesta
 * @property string|null $descripcion_conjesta
 * @property int|null $orden_conjesta
 * @property bool|null $estado_conjesta
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class TblConjuntosEstados extends Model
{
	protected $table = 'tbl_conjuntos_estados';

	protected $casts = [
		'orden_conjesta' => 'int',
		'estado_conjesta' => 'bool'
	];

	protected $fillable = [
		'nombre_conjesta',
		'descripcion_conjesta',
		'orden_conjesta',
		'estado_conjesta'
	];
}
