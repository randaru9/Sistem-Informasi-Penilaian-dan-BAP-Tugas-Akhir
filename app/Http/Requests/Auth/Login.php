<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class Login extends FormRequest
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
            'nim_nip' => 'required|string',
            'katasandi' => 'required|string',
        ];
    }

    public function attributes(): array{
        return [
            'nim_nip' => 'NIM/NIP',
            'katasandi' => 'Katasandi',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute harus diisi',
            'string' => ':attribute harus berupa string',
        ];
    }
}
