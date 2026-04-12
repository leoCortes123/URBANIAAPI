<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateConjuntoUsuarioRequest extends FormRequest
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
            'user_id' => [
                'required',
                'integer',
                Rule::exists('users', 'id'),
                Rule::unique('tbl_conjunto_user', 'user_id')
                    ->where('conjunto_id', (int) $this->input('conjunto_id'))
                    ->ignore($id),
            ],
            'conjunto_id' => ['required', 'integer', Rule::exists('tbl_conjuntos', 'id')],
            'fecha_vinculacion' => ['nullable', 'date'],
            'estado_conjuser' => ['nullable', 'boolean'],
        ];
    }
}
