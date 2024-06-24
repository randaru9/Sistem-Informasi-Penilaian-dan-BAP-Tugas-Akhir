<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LengkapiDataDiri extends FormRequest
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
            'email' => 'required|email|unique:pengguna,email',
            'katasandi' => 'required|string|min_digits:8',
            'konfirmasi_katasandi' => 'required|string|min_digits:8'
        ];
    }

    public function attributes(): array
    {
        return [
            'email' => 'Email',
            'katasandi' => 'Katasandi',
            'konfirmasi_katasandi' => 'Konfirmasi Katasandi'
        ];
    }

    public function messages(): array{
        return [
            'required' => ':attribute harus diisi.',
            'email' => ':attribute harus berupa email.',
            'min_digits' => ':attribute harus berupa :min karakter.',
            'string' => ':attribute harus berupa string.',
            'unique' => ':attribute sudah terdaftar.'
        ];
    }
}
