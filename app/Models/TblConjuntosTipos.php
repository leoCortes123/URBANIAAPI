<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TblConjuntosTipos
 * 
 * @property int $id
 * @property string $nombre_tipoconj
 * @property string|null $descripcion_tipoconj
 * @property bool|null $estado_conest
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class TblConjuntosTipos extends Model
{
	protected $table = 'tbl_conjuntos_tipos';

	protected $casts = [
		'estado_conest' => 'bool'
	];

	protected $fillable = [
		'nombre_tipoconj',
		'descripcion_tipoconj',
		'estado_conest'
	];
}
