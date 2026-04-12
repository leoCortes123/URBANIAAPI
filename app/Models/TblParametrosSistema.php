<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $codigo_param_sist
 * @property string $nombre_param_sist
 * @property string|null $valor_param_sist
 * @property string $tipo_dato_param_sist
 * @property string|null $descripcion_param_sist
 * @property bool|null $editable_param_sist
 */
class TblParametrosSistema extends Model
{
    protected $table = 'tbl_parametros_sistema';

    protected $casts = [
        'editable_param_sist' => 'bool',
    ];

    protected $fillable = [
        'codigo_param_sist',
        'nombre_param_sist',
        'valor_param_sist',
        'tipo_dato_param_sist',
        'descripcion_param_sist',
        'editable_param_sist',
    ];
}
