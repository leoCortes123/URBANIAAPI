<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBloqueRequest extends FormRequest
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
            'nombre_bloque' => ['required', 'string', 'max:255'],
            'descripcion_bloque' => ['nullable', 'string', 'max:500'],
            'numero_unidades_bloque' => ['nullable', 'integer'],
            'orden_bloque' => ['nullable', 'integer'],
            'estado_bloque' => ['nullable', 'boolean'],
            'conjunto_id' => ['required', 'integer', Rule::exists('tbl_conjuntos', 'id')],
        ];
    }
}
