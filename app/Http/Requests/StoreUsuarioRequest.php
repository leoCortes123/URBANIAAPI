<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUsuarioRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'documento' => ['required', 'string', 'max:50'],
            'telefono' => ['nullable', 'string', 'max:30'],
            'foto_url' => ['nullable', 'string', 'max:500'],
            'estado' => ['nullable', 'boolean'],
            'ultimo_acceso' => ['nullable', 'date'],
            'tipo_documento_id' => ['required', 'integer', Rule::exists('tbl_users_tipos_documentos', 'id')],
            'rol_id' => ['required', 'integer', Rule::exists('tbl_roles', 'id')],
            'users_estado_id' => ['required', 'integer', Rule::exists('tbl_users_estados', 'id')],
        ];
    }
}
