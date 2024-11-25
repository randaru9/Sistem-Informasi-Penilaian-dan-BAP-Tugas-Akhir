<?php

namespace App\Http\Requests\BAP;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRentangNilai extends FormRequest
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
            'min_a' => 'required|numeric|between:0,100',
            'min_ab' => 'required|numeric|between:0,100',
            'min_b' => 'required|numeric|between:0,100',
            'min_bc' => 'required|numeric|between:0,100',
            'min_c' => 'required|numeric|between:0,100',
        ];
    }

    public function attributes(): array
    {
        return [
            'min_a' => 'Minimal Nilai A',
            'min_ab' => 'Minimal Nilai AB',
            'min_b' => 'Minimal Nilai B',
            'min_bc' => 'Minimal Nilai BC',
            'min_c' => 'Minimal Nilai C',
        ];
    }

    public function messages(): array{
        return [
            'required' => ':attribute harus diisi',
            'exists' => ':attribute tidak ditemukan',
            'uuid' => ':attribute harus berupa UUID',
            'image' => ':attribute harus berupa gambar',
            'mimes' => ':attribute harus berupa gambar dengan format png, jpg, jpeg',
        ];
    }
}
