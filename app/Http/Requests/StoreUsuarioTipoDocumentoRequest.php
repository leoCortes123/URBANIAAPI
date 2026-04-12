<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuarioTipoDocumentoRequest extends FormRequest
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
            'nombre_tipodocu' => ['required', 'string', 'max:255'],
            'codigo_tipodocu' => ['nullable', 'string', 'max:255'],
            'estado_tipodocu' => ['nullable', 'boolean'],
        ];
    }
}
