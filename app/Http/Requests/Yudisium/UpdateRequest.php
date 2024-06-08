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
            'id' => 'uuid|exists:yudisium',
            'pengguna_id' => 'uuid|exists:pengguna',
            'status_yudisium_id' => 'uuid|exists:status_yudisium',
            'periode_wisuda_id' => 'uuid|exists:periode_wisuda',
            'tempat_dan_bidang_kerja' => 'string',
            'saran_dan_kritik' => 'string',
            'berkas' => 'file|mimes:zip,rar',
            'catatan' => 'string',
        ];
    }

    public function attributes(): array
    {
        return [
            'id' => 'Yudisium',
            'pengguna_id' => 'Pengguna',
            'status_yudisium_id' => 'Status Yudisium',
            'periode_wisuda_id' => 'Periode Wisuda',
            'tempat_dan_bidang_kerja' => 'Tempat dan Bidang Kerja',
            'saran_dan_kritik' => 'Saran dan Kritik',
            'berkas' => 'Berkas',
            'catatan' => 'Catatan',
        ];
    }

    public function messages(): array
    {
        return [
            'uuid' => ':attribute wajib UUID',
            'exists' => ':attribute tidak ditemukan',
            'string' => ':attribute harus string',
            'file' => ':attribute harus berupa file',
            'mimes' => ':attribute harus berupa file zip atau rar',
        ];
    }

}