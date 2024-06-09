<?php

namespace App\Http\Requests\Penilaian;

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
            'pengguna_id' => 'required|uuid|exists:pengguna',
            'seminar_id' => 'required|uuid|exists:seminar',
            'penulisan_draft_tugas_akhir_dan_ppt' => 'required|numeric|between:0,100',
            'penyajian_atau_presentasi' => 'required|numeric|between:0,100',
            'penguasaan_materi' => 'required|numeric|between:0,100',
            'kemampuan_menjawab' => 'required|numeric|between:0,100',
            'etika_dan_sopan_santun' => 'required|numeric|between:0,100',
            'nilai_bimbingan' => 'numeric|between:0,100',
            'ttd' => 'required|file|mimes:png,jpg,jpeg',
        ];
    }
    
    public function attributes(): array{
        return [
            'pengguna_id' => 'Pengguna',
            'seminar_id' => 'Seminar',
            'penulisan_draft_tugas_akhir_dan_ppt' => 'Penulisan Draft Tugas Akhir dan PPT',
            'penyajian_atau_presentasi' => 'Penyajian atau Presentasi',
            'penguasaan_materi' => 'Penguasaan Materi',
            'kemampuan_menjawab' => 'Kemampuan Menjawab',
            'etika_dan_sopan_santun' => 'Etika dan Sopan Santun',
            'nilai_bimbingan' => 'Nilai Bimbingan',
            'ttd' => 'Tanda Tangan',
        ];
    } 

    public function messages(): array
    {
        return [
            'required' => ':attribute wajib diisi',
            'exists' => ':attribute tidak ditemukan',
            'numeric' => ':attribute harus berupa angka',
            'file' => ':attribute harus berupa file',
            'mimes' => ':attribute harus berupa file PNG, JPG, JPEG',
            'between' => ':attribute harus antara :min sampai :max',
        ];
    }
}
