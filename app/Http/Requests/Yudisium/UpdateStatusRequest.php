<?php

namespace App\Http\Requests;

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
            'id' => 'required|exists:yudisium',
            'status_yudisium_id' => 'required|exists:status_yudisiums,id',
        ];
    }

    public function attributes(): array
    {
        return [
            'id' => 'Yudisium',
            'status_yudisium_id' => 'Status Yudisium',
        ];
    }

    public function messages(): array {
        return [
            'required' => ':attribute harus diisi.',
            'exists' => ':attribute tidak ditemukan.',
        ];
    }
}
