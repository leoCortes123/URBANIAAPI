<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $categoria_concepto_id
 * @property string $codigo_concepto
 * @property string $nombre_concepto
 * @property string|null $descripcion_concepto
 * @property string|null $valor_base_concepto
 * @property string|null $periodicidad_concepto
 * @property bool|null $activo_concepto
 */
class TblConceptosCobro extends Model
{
    protected $table = 'tbl_conceptos_cobro';

    protected $casts = [
        'categoria_concepto_id' => 'int',
        'valor_base_concepto' => 'decimal:2',
        'activo_concepto' => 'bool',
    ];

    protected $fillable = [
        'categoria_concepto_id',
        'codigo_concepto',
        'nombre_concepto',
        'descripcion_concepto',
        'valor_base_concepto',
        'periodicidad_concepto',
        'activo_concepto',
    ];
}
