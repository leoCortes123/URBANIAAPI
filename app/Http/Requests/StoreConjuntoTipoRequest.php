<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreConjuntoTipoRequest extends FormRequest
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
            'nombre_tipoconj' => ['required', 'string', 'max:255'],
            'descripcion_tipoconj' => ['nullable', 'string', 'max:255'],
            'estado_conest' => ['nullable', 'boolean'],
        ];
    }
}
