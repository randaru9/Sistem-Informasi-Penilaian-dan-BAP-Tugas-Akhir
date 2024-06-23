<?php

namespace App\Http\Requests\Pengguna;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKatasandiForPenggunaRequest extends FormRequest
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
            'katasandi' => 'required|string|min_digits:9',
            'konfirmasi_katasandi' => 'required|string|min_digits:9',
        ];
    }
    
    public function attributes(): array
    {
        return [
            'katasandi' => 'Kata Sandi',
            'konfirmasi_katasandi' => 'Konfirmasi Kata Sandi',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute harus diisi.',
            'string' => ':attribute harus berupa string.',
            'min_digits' => ':attribute harus 9 digit.',
        ];
    }
}
