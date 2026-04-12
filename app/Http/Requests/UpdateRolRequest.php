<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRolRequest extends FormRequest
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
            'nombre_rol' => ['required', 'string', 'max:255'],
            'codigo_rol' => ['required', 'string', 'max:255'],
            'descripcion_rol' => ['nullable', 'string', 'max:255'],
            'nivel_rol' => ['nullable', 'integer'],
            'estado_rol' => ['nullable', 'boolean'],
        ];
    }
}
