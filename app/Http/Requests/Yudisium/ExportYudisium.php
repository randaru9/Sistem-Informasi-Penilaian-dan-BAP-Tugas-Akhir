<?php

namespace App\Http\Requests\Yudisium;

use Illuminate\Foundation\Http\FormRequest;

class ExportYudisium extends FormRequest
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
            'periode' => 'required|exists:periode_wisuda,id',
            'tahun' => 'required',
        ];
    }

    public function attributes(){
        return [
            'periode' => 'periode wisuda',
            'tahun' => 'tahun',
        ];
    }

    public function messages(){
        return [
            'exists' => ':attribute tidak ditemukan',
            'required' => ':attribute harus diisi',
        ];
    }
}
