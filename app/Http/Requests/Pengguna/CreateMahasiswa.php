<?php

namespace App\Http\Requests\Pengguna;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateMahasiswa extends FormRequest
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
            'nim' => ['required', 'string', 'max_digits:9', 'min_digits:9' ,Rule::unique('pengguna')->withoutTrashed()],
            'katasandi' => 'required|string|min_digits:8',
        ];
    }

    public function attributes(): array
    {
        return [
            'nama' => 'Nama',
            'nim' => 'NIM',
            'katasandi' => 'Katasandi',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute harus diisi',
            'string' => ':attribute harus string',
            'min_digits' => ':attribute harus lebih dari 8 digit',
            'max_digits' => ':attribute harus kurang dari 9 digit',
            'unique' => ':attribute sudah ada',
        ];
    }
}
