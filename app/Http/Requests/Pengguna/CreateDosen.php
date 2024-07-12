<?php

namespace App\Http\Requests\Pengguna;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateDosen extends FormRequest
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
            'nama' => ['required', 'string', Rule::unique('pengguna')->withoutTrashed()],
            'nip' => ['required', 'string', 'max_digits:18', 'min_digits:16' ,Rule::unique('pengguna')->withoutTrashed()],
            'email' => ['required', 'email', Rule::unique('pengguna')->withoutTrashed()],
            'katasandi' => 'required|string|min_digits:8',
        ];
    }

    public function attributes(): array
    {
        return [
            'nama' => 'Nama',
            'nip' => 'NIP',
            'email' => 'Email',
            'katasandi' => 'Katasandi',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute harus diisi',
            'string' => ':attribute harus string',
            'email' => ':attribute harus email',
            'nip.min_digits' => ':attribute harus 18 digit',
            'nip.max_digits' => ':attribute harus 18 digit',
            'katasandi.min_digits' => ':attribute harus 8 digit',
            'unique' => ':attribute sudah ada',
        ];
    }
}
