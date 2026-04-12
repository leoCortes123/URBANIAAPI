<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreConceptoCobroRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'categoria_concepto_id' => ['required', 'integer', Rule::exists('tbl_categorias_conceptos', 'id')],
            'codigo_concepto' => ['required', 'string', 'max:100'],
            'nombre_concepto' => ['required', 'string', 'max:255'],
            'descripcion_concepto' => ['nullable', 'string', 'max:500'],
            'valor_base_concepto' => ['nullable', 'numeric'],
            'periodicidad_concepto' => ['nullable', 'string', 'max:50'],
            'activo_concepto' => ['nullable', 'boolean'],
        ];
    }
}
