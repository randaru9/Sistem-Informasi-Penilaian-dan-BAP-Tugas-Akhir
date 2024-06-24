<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class BuatKatasandiBaruwithOtp extends FormRequest
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
            'katasandi' => 'required|string|min_digits:8|',
            'konfirmasi_katasandi' => 'required|string|min_digits:8',
        ];
    }

    public function attributes(): array
    {
        return [
            'katasandi' => 'Katasandi',
            'konfirmasi_katasandi' => 'Konfirmasi Katasandi',
        ];
    }

    public function messages(): array{
        return [
            'required' => ':attribute harus diisi',
            'min_digits' => ':attribute minimal 8 digit',
            'string' => ':attribute harus berupa string',
        ];
    }
}
