<?php

namespace App\Http\Requests\Pengguna;

use Illuminate\Foundation\Http\FormRequest;

class ParsingPenggunaRequest extends FormRequest
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
            'file' => 'required|mimes:xlsx|max:10240',
        ];
    }

    public function attributes(): array
    {
        return [
            'file' => 'File',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute harus diisi',
            'mimes' => ':attribute harus berupa file excel',
            'max' => ':attribute maksimal 10 MB',
        ];
    }
}
