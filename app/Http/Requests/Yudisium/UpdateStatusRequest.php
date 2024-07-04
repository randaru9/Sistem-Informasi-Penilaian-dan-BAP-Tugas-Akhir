<?php

namespace App\Http\Requests\Yudisium;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStatusRequest extends FormRequest
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
            'alasan_penolakan' => 'required|string',
        ];
    }

    public function attributes(): array
    {
        return [
            'alasan_penolakan' => 'Alasan Penolakan',
        ];
    }

    public function messages(): array {
        return [
            'required' => ':attribute harus diisi.',
            'string' => ':attribute harus berupa string.'
        ];
    }
}
