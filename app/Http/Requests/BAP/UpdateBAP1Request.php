<?php

namespace App\Http\Requests\BAP;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBAP1Request extends FormRequest
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
            'id' => 'required|uuid|exists:bap1,id',
            'ttd' => 'required|image|mimes:png,jpg,jpeg',
        ];
    }

    public function attributes(): array
    {
        return [
            'id' => 'BAP 1',
            'ttd' => 'Tanda Tangan',
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
