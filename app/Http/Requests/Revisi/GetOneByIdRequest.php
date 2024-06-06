<?php

namespace App\Http\Requests\Revisi;

use Illuminate\Foundation\Http\FormRequest;

class GetOneByIdRequest extends FormRequest
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
            'id' => 'required|uuid|exists:revisi',
        ];
    }

    public function attributes(): array
    {
        return [
            'id' => 'Revisi',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute harus diisi',
            'uuid' => ':attribute harus UUID',
            'exists' => ':attribute tidak ditemukan',
        ];
    }
}
