<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDepartamentoRequest extends FormRequest
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
            'codigo_dane_departam' => ['nullable', 'string', 'max:255'],
            'nombre_departam' => ['required', 'string', 'max:255'],
            'estado_departam' => ['nullable', 'boolean'],
            'pais_id' => ['required', 'integer', Rule::exists('tbl_pais', 'id')],
        ];
    }
}
