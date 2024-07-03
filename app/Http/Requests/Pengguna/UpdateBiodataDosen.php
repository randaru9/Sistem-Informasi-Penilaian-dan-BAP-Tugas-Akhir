<?php

namespace App\Http\Requests\Pengguna;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBiodataDosen extends FormRequest
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
            'nama' => 'string|unique:pengguna',
            'nip' => 'string|min_digits:18|unique:pengguna',
        ];
    }

    public function attributes(): array
    {
        return [
            'nama' => 'Nama',
            'nip' => 'NIP',
        ];
    }

    public function messages(): array
    {
        return [
            'unique' => ':attribute sudah ada',
            'string' => ':attribute harus string',
            'max_digits' => ':attribute harus lebih kecil sama dengan 9 digit',
            'min_digits' => ':attribute harus lebih besar sama dengan 9 digit',
        ];
    }

}
