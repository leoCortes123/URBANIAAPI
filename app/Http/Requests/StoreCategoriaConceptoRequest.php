<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoriaConceptoRequest extends FormRequest
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
            'nombre_catconc' => ['required', 'string', 'max:255'],
            'codigo_catconc' => ['nullable', 'string', 'max:255'],
            'descripcion_catconc' => ['nullable', 'string', 'max:255'],
            'orden_catconc' => ['nullable', 'integer'],
            'estado_catconc' => ['nullable', 'boolean'],
        ];
    }
}
