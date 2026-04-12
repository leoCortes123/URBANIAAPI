<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaisRequest extends FormRequest
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
            'codigo_pais' => ['nullable', 'string', 'max:255'],
            'nombre_pais' => ['required', 'string', 'max:255'],
            'codigo_iso_pais' => ['nullable', 'string', 'max:255'],
            'estado_pais' => ['nullable', 'boolean'],
        ];
    }
}
