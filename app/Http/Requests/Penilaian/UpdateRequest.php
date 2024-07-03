<?php

namespace App\Http\Requests\Penilaian;

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
            'penulisan' => 'required|numeric|between:0,100',
            'penyajian' => 'required|numeric|between:0,100',
            'penguasaan' => 'required|numeric|between:0,100',
            'kemampuan_menjawab' => 'required|numeric|between:0,100',
            'etika' => 'required|numeric|between:0,100',
            'bimbingan' => 'numeric|between:0,100',
            'ttd' => 'nullable|mimes:png,jpg,jpeg|max:5240',
        ];
    }

    public function attributes(): array
    {
        return [
            'penulisan' => 'Penulisan Draft Tugas Akhir dan PPT',
            'penyajian' => 'Penyajian atau Presentasi',
            'penguasaan' => 'Penguasaan Materi',
            'kemampuan_menjawab' => 'Kemampuan Menjawab',
            'etika' => 'Etika dan Sopan Santun',
            'bimbingan' => 'Nilai Bimbingan',
            'ttd' => 'Tanda Tangan',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute wajib diisi',
            'exists' => ':attribute tidak ditemukan',
            'numeric' => ':attribute harus berupa angka',
            'mimes' => ':attribute harus berupa file PNG, JPG, JPEG',
            'between' => ':attribute harus antara :min sampai :max',
        ];
    }
}
