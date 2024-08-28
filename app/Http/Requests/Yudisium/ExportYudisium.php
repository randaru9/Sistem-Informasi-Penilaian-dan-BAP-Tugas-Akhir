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
            'periode' => 'required|date',
        ];
    }

    public function attributes(){
        return [
            'periode' => 'periode wisuda',
        ];
    }

    public function messages(){
        return [
            'date' => ':attribute harus berupa tanggal',
            'required' => ':attribute harus diisi',
        ];
    }
}
