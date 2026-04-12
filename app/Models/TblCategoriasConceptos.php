<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TblCategoriasConceptos
 *
 * @property int $id
 * @property string $nombre_catconc
 * @property string|null $codigo_catconc
 * @property string|null $descripcion_catconc
 * @property int|null $orden_catconc
 * @property bool|null $estado_catconc
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class TblCategoriasConceptos extends Model
{
    protected $table = 'tbl_categorias_conceptos';

    protected $casts = [
        'orden_catconc' => 'int',
        'estado_catconc' => 'bool',
    ];

    protected $fillable = [
        'nombre_catconc',
        'codigo_catconc',
        'descripcion_catconc',
        'orden_catconc',
        'estado_catconc',
    ];
}
