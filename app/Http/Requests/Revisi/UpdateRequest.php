<?php

namespace App\Http\Requests\Revisi;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'id' => 'uuid|required|exists:revisi,id',
            'keterangan' => 'string|required',
        ];
    }

    public function attributes(): array
    {
        return [
            'id' => 'Revisi',
            'keterangan' => 'Keterangan',
        ];
    }

    public function messages(): array
    {
        return [
            'uuid' => ':attribute harus UUID',
            'exists' => ':attribute tidak ditemukan',
            'string' => ':attribute harus berupa string',
            'required' => ':attribute harus diisi',
        ];
    }
}
