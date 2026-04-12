<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TblUsersTiposDocumentos
 * 
 * @property int $id
 * @property string $nombre_tipodocu
 * @property string|null $codigo_tipodocu
 * @property bool|null $estado_tipodocu
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class TblUsersTiposDocumentos extends Model
{
	protected $table = 'tbl_users_tipos_documentos';

	protected $casts = [
		'estado_tipodocu' => 'bool'
	];

	protected $fillable = [
		'nombre_tipodocu',
		'codigo_tipodocu',
		'estado_tipodocu'
	];
}
