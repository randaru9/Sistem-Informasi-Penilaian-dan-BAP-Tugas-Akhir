<?php

namespace App\Http\Requests\Yudisium;

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
            'periode_wisuda' => 'required|exists:periode_wisuda,id',
            'berkas' => 'required|mimes:zip,rar|max:10240',
        ];
    }

    public function attributes(): array
    {
        return [
            'periode_wisuda' => 'Periode Wisuda',
            'berkas' => 'Berkas',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute wajib diisi',
            'exists' => ':attribute tidak ditemukan',
            'mimes' => ':attribute harus berupa berkas zip atau rar',
        ];
    }

}
