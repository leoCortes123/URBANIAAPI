<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMunicipioRequest extends FormRequest
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
            'codigo_dane_municipi' => ['nullable', 'string', 'max:255'],
            'nombre_municipi' => ['required', 'string', 'max:255'],
            'estado_municipi' => ['nullable', 'boolean'],
            'departamento_id' => ['required', 'integer', Rule::exists('tbl_departamentos', 'id')],
        ];
    }
}
