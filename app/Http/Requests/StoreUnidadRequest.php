<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUnidadRequest extends FormRequest
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
            'numero_unidad' => ['required', 'string', 'max:255'],
            'codigo_unidad' => ['nullable', 'string', 'max:255'],
            'piso_unidad' => ['nullable', 'integer'],
            'area_m2_unidad' => ['nullable', 'numeric'],
            'coeficiente_unidad' => ['nullable', 'numeric'],
            'estado_unidad' => ['nullable', 'boolean'],
            'bloque_id' => ['required', 'integer', Rule::exists('tbl_bloques', 'id')],
            'conjunto_id' => ['required', 'integer', Rule::exists('tbl_conjuntos', 'id')],
            'estado_ocupacion_id' => ['required', 'integer', Rule::exists('tbl_unidades_estados', 'id')],
        ];
    }
}
