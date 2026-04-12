<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUnidadEstadoRequest extends FormRequest
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
            'nombre_unidesta' => ['required', 'string', 'max:255'],
            'codigo_unidesta' => ['nullable', 'string', 'max:255'],
            'descripcion_unidesta' => ['nullable', 'string', 'max:255'],
            'estado_unidesta' => ['nullable', 'boolean'],
            'orden_unidesta' => ['nullable', 'integer'],
        ];
    }
}
