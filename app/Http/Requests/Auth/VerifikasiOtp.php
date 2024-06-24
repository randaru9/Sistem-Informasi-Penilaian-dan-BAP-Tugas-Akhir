<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class VerifikasiOtp extends FormRequest
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
            'otp' => 'required|numeric|min_digits:6|max_digits:6',
        ];
    }

    public function attributes(): array{
        return [
            'otp' => 'OTP',
        ];
    }

    public function messages(): array{
        return [
            'required' => ':attribute harus diisi.',
            'numeric' => ':attribute harus berupa angka.',
            'min_digits' => ':attribute harus 6 digit.',
            'max_digits' => ':attribute harus 6 digit.',
        ];
    }
}
