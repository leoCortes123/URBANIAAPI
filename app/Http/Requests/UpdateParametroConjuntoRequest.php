<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateParametroConjuntoRequest extends FormRequest
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
            'parametro_sistema_id' => [
                'required',
                'integer',
                Rule::exists('tbl_parametros_sistema', 'id'),
                Rule::unique('tbl_parametros_conjunto', 'parametro_sistema_id')
                    ->where('conjunto_id', (int) $this->input('conjunto_id'))
                    ->ignore($id),
            ],
            'conjunto_id' => ['required', 'integer', Rule::exists('tbl_conjuntos', 'id')],
            'valor_param_conjunto' => ['nullable', 'string'],
        ];
    }
}
