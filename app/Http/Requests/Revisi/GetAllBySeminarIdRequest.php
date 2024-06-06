<?php

namespace App\Http\Requests\Revisi;

use Illuminate\Foundation\Http\FormRequest;

class GetAllBySeminarIdRequest extends FormRequest
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
            'seminar_id' => 'required|uuid|exists:seminar',
        ];
    }

    public function attributes(): array
    {
        return [
            'seminar_id' => 'Seminar',
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
