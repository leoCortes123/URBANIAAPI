<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateParametroSistemaRequest extends FormRequest
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
        $id = (int) $this->route('id');

        return [
            'codigo_param_sist' => ['required', 'string', 'max:100', Rule::unique('tbl_parametros_sistema', 'codigo_param_sist')->ignore($id)],
            'nombre_param_sist' => ['required', 'string', 'max:255'],
            'valor_param_sist' => ['nullable', 'string'],
            'tipo_dato_param_sist' => ['sometimes', 'string', 'max:50'],
            'descripcion_param_sist' => ['nullable', 'string', 'max:500'],
            'editable_param_sist' => ['nullable', 'boolean'],
        ];
    }
}
