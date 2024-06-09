<?php

namespace App\Http\Requests\Revisi;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'pengguna_id' => 'required|uuid|exists:pengguna,id',
            'seminar_id' => 'required|uuid|exists:seminar,id',
            'keterangan' => 'required|string',
        ];
    }

    public function attributes(): array
    {
        return [
            'pengguna_id' => 'Pengguna',
            'seminar_id' => 'Seminar',
            'keterangan' => 'Keterangan',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute harus diisi',
            'uuid' => ':attribute harus UUID',
            'exists' => ':attribute tidak ditemukan',
            'string' => ':attribute harus berupa string',
        ];
    }
}
