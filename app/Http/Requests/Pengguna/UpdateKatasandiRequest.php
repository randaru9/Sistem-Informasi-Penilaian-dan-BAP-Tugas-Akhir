<?php

namespace App\Http\Requests\Pengguna;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKatasandiRequest extends FormRequest
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
            'katasandi_lama' => 'string|required|min_digits:8',
            'katasandi_baru' => 'string|required|min_digits:8',
            'konfirmasi_katasandi' => 'string|required|min_digits:8',
        ];
    }

    public function attributes(): array
    {
        return [
            'katasandi_lama' => 'Katasandi Lama',
            'katasandi_baru' => 'Katasandi Baru',
            'konfirmasi_katasandi' => 'Konfirmasi Katasandi Baru',
        ];
    }

    public function messages(): array
    {
        return [
            'string' => ':attribute harus string',
            'min_digits' => ':attribute harus lebih besar sama dengan 8 digit',
            'required' => ':attribute harus diisi',
            'exists' => ':attribute tidak ditemukan',
        ];
    }


}
