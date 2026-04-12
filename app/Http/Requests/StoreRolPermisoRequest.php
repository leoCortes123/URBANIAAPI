<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRolPermisoRequest extends FormRequest
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
            'rol_id' => ['required', 'integer', Rule::exists('tbl_roles', 'id')],
            'permiso_id' => ['required', 'integer', Rule::exists('tbl_permisos', 'id')],
        ];
    }
}
