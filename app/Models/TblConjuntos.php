<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TblConjuntos
 * 
 * @property int $id
 * @property string $nombre_conjunto
 * @property string $nit_conjunto
 * @property string|null $direccion_conjunto
 * @property string|null $telefono_conjunto
 * @property int|null $estrato_conjunto
 * @property float|null $coeficiente_total_conjunto
 * @property string|null $datos_bancarios_conjunto
 * @property string|null $reglamento_url_conjunto
 * @property string|null $logo_url_conjunto
 * @property string|null $portada_url_conjunto
 * @property string|null $galeria_conjunto
 * @property bool|null $estado_conjunto
 * @property int $conjunto_tipo_id
 * @property int $conjunto_estado_id
 * @property int $municipio_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class TblConjuntos extends Model
{
	protected $table = 'tbl_conjuntos';

	protected $casts = [
		'estrato_conjunto' => 'int',
		'coeficiente_total_conjunto' => 'float',
		'estado_conjunto' => 'bool',
		'conjunto_tipo_id' => 'int',
		'conjunto_estado_id' => 'int',
		'municipio_id' => 'int'
	];

	protected $fillable = [
		'nombre_conjunto',
		'nit_conjunto',
		'direccion_conjunto',
		'telefono_conjunto',
		'estrato_conjunto',
		'coeficiente_total_conjunto',
		'datos_bancarios_conjunto',
		'reglamento_url_conjunto',
		'logo_url_conjunto',
		'portada_url_conjunto',
		'galeria_conjunto',
		'estado_conjunto',
		'conjunto_tipo_id',
		'conjunto_estado_id',
		'municipio_id'
	];
}
