<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePermisoRequest extends FormRequest
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
            'codigo_permiso' => ['nullable', 'string', 'max:255'],
            'nombre_permiso' => ['required', 'string', 'max:255'],
            'modulo_permiso' => ['required', 'string', 'max:255'],
            'descripcion_permiso' => ['nullable', 'string', 'max:255'],
        ];
    }
}
