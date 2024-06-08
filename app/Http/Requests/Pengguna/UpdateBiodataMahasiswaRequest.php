<?php

namespace App\Http\Requests\Pengguna;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBiodataMahasiswaRequest extends FormRequest
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
            'id' => 'uuid|exists:pengguna',
            'nama' => 'string|unique:pengguna',
            'nim' => 'string|max_digits:9|min_digits:9|unique:pengguna',
        ];
    }

    public function attributes(): array
    {
        return [
            'id' => 'Pengguna',
            'nama' => 'Nama',
            'nim' => 'NIM',
        ];
    }

    public function messages(): array
    {
        return [
            'uuid' => ':attribute wajib UUID',
            'unique' => ':attribute sudah ada',
            'string' => ':attribute harus string',
            'max_digits' => ':attribute harus lebih kecil sama dengan 9 digit',
            'min_digits' => ':attribute harus lebih besar sama dengan 9 digit',
            'exists' => ':attribute tidak ditemukan',
        ];
    }
}
