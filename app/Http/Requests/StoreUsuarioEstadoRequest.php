<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuarioEstadoRequest extends FormRequest
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
            'nombre_useresta' => ['required', 'string', 'max:255'],
            'codigo_useresta' => ['nullable', 'string', 'max:255'],
            'descripcion_useresta' => ['nullable', 'string', 'max:255'],
            'orden_useresta' => ['nullable', 'integer'],
            'estado_useresta' => ['nullable', 'boolean'],
        ];
    }
}
