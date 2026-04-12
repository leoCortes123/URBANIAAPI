<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreConjuntoRequest extends FormRequest
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
            'nombre_conjunto' => ['required', 'string', 'max:255'],
            'nit_conjunto' => ['required', 'string', 'max:255'],
            'direccion_conjunto' => ['nullable', 'string', 'max:255'],
            'telefono_conjunto' => ['nullable', 'string', 'max:255'],
            'estrato_conjunto' => ['nullable', 'integer'],
            'coeficiente_total_conjunto' => ['nullable', 'numeric'],
            'datos_bancarios_conjunto' => ['nullable', 'string'],
            'reglamento_url_conjunto' => ['nullable', 'string', 'max:500'],
            'logo_url_conjunto' => ['nullable', 'string', 'max:500'],
            'portada_url_conjunto' => ['nullable', 'string', 'max:500'],
            'galeria_conjunto' => ['nullable', 'string'],
            'estado_conjunto' => ['nullable', 'boolean'],
            'conjunto_tipo_id' => ['required', 'integer', Rule::exists('tbl_conjuntos_tipos', 'id')],
            'conjunto_estado_id' => ['required', 'integer', Rule::exists('tbl_conjuntos_estados', 'id')],
            'municipio_id' => ['required', 'integer', Rule::exists('tbl_municipios', 'id')],
        ];
    }
}
