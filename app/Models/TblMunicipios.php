<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TblMunicipios
 * 
 * @property int $id
 * @property string|null $codigo_dane_municipi
 * @property string $nombre_municipi
 * @property bool|null $estado_municipi
 * @property int $departamento_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class TblMunicipios extends Model
{
	protected $table = 'tbl_municipios';

	protected $casts = [
		'estado_municipi' => 'bool',
		'departamento_id' => 'int'
	];

	protected $fillable = [
		'codigo_dane_municipi',
		'nombre_municipi',
		'estado_municipi',
		'departamento_id'
	];
}
