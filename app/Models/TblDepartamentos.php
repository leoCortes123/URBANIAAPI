<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TblDepartamentos
 * 
 * @property int $id
 * @property string|null $codigo_dane_departam
 * @property string $nombre_departam
 * @property bool|null $estado_departam
 * @property int $pais_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class TblDepartamentos extends Model
{
	protected $table = 'tbl_departamentos';

	protected $casts = [
		'estado_departam' => 'bool',
		'pais_id' => 'int'
	];

	protected $fillable = [
		'codigo_dane_departam',
		'nombre_departam',
		'estado_departam',
		'pais_id'
	];
}
