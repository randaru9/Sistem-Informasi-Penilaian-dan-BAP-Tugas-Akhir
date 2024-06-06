<?php

namespace App\Http\Requests\Seminar;

use Illuminate\Foundation\Http\FormRequest;

class GetByIdRequest extends FormRequest
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
            'id' => 'required|exists:seminar',
        ];
    }

    public function attributes(): array
    {
        return [
            'id' => 'Seminar',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute harus diisi',
            'exists' => ':attribute tidak ditemukan',
        ];
    }
}
