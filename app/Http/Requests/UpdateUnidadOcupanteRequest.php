<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUnidadOcupanteRequest extends FormRequest
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
            'tipo_ocupante' => ['required', 'string', 'max:50'],
            'es_titular' => ['nullable', 'boolean'],
            'fecha_inicio' => ['required', 'date'],
            'fecha_fin' => ['nullable', 'date', 'after_or_equal:fecha_inicio'],
            'estado_ocupante' => ['nullable', 'boolean'],
            'observaciones' => ['nullable', 'string'],
            'unidad_id' => ['required', 'integer', Rule::exists('tbl_unidades', 'id')],
            'user_id' => ['required', 'integer', Rule::exists('users', 'id')],
            'conjunto_id' => ['required', 'integer', Rule::exists('tbl_conjuntos', 'id')],
        ];
    }
}
