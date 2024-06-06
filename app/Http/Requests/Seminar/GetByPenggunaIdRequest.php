<?php

namespace App\Http\Requests\Seminar;

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
            'pengguna_id' => 'Pengguna ID',
        ];
    }

    public function messages(): array
    {
        return [
            'pengguna_id.required' => 'Pengguna ID harus diisi',
            'pengguna_id.uuid' => 'Pengguna ID harus UUID',
            'pengguna_id.exists' => 'Pengguna ID tidak ditemukan',
        ];
    }
}
