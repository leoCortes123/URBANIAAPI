<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateConjuntoEstadoRequest extends FormRequest
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
            'nombre_conjesta' => ['required', 'string', 'max:255'],
            'descripcion_conjesta' => ['nullable', 'string', 'max:255'],
            'orden_conjesta' => ['nullable', 'integer'],
            'estado_conjesta' => ['nullable', 'boolean'],
        ];
    }
}
