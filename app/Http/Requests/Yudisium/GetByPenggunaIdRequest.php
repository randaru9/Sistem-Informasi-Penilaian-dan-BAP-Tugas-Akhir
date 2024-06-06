<?php

namespace App\Http\Requests\Yudisium;

use Illuminate\Foundation\Http\FormRequest;

class GetByPenggunaIdRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'pengguna_id' => 'required|uuid|exists:pengguna',
        ];
    }

    public function attributes(): array
    {
        return [
            'pengguna_id' => 'Pengguna',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute wajib diisi',
            'uuid' => ':attribute wajib UUID',
            'exists' => ':attribute tidak ditemukan',
        ];
    }
}
