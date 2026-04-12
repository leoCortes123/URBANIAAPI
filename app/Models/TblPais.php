<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TblPais
 * 
 * @property int $id
 * @property string|null $codigo_pais
 * @property string $nombre_pais
 * @property string|null $codigo_iso_pais
 * @property bool|null $estado_pais
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class TblPais extends Model
{
	protected $table = 'tbl_pais';

	protected $casts = [
		'estado_pais' => 'bool'
	];

	protected $fillable = [
		'codigo_pais',
		'nombre_pais',
		'codigo_iso_pais',
		'estado_pais'
	];
}
