<?php

namespace App\Http\Requests\Yudisium;

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
            'periode_wisuda' => 'required|date',
            'berkas' => 'required|mimes:zip,rar|max:51200',
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
            'date' => ':attribute harus berupa tanggal',
            'mimes' => ':attribute harus berupa berkas zip atau rar',
            'max' => ':attribute maksimal 50 MB',
        ];
    }
}
