<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $parametro_sistema_id
 * @property int $conjunto_id
 * @property string|null $valor_param_conjunto
 */
class TblParametrosConjunto extends Model
{
    protected $table = 'tbl_parametros_conjunto';

    protected $casts = [
        'parametro_sistema_id' => 'int',
        'conjunto_id' => 'int',
    ];

    protected $fillable = [
        'parametro_sistema_id',
        'conjunto_id',
        'valor_param_conjunto',
    ];
}
