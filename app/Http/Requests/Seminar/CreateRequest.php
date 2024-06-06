<?php

namespace App\Http\Requests\Seminar;

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
            'bap1_id' => 'required|uuid|exists:bap_1',
            'bap2_id' => 'required|uuid|exists:bap_2',
            'pembimbing_1_id' => 'required|uuid|exists:pengguna',
            'pembimbing_2_id' => 'required|uuid|exists:pengguna',
            'penguji_1_id' => 'required|uuid|exists:pengguna',
            'penguji_2_id' => 'required|uuid|exists:pengguna',
            'pimpinan_sidang_id' => 'required|uuid|exists:pengguna',
            'jenis_seminar_id' => 'required|uuid|exists:jenis_seminar',
            'judul' => 'required|string',
            'tanggal' => 'required|string',
            'waktu' => 'required|string',
        ];
    }

    public function attributes(): array
    {
        return [
            'pengguna_id' => 'Pengguna',
            'bap1_id' => 'BAP 1',
            'bap2_id' => 'BAP 2',
            'pembimbing_1_id' => 'Pembimbing 1',
            'pembimbing_2_id' => 'Pembimbing 2',
            'penguji_1_id' => 'Penguji 1',
            'penguji_2_id' => 'Penguji 2',
            'pimpinan_sidang_id' => 'Pimpinan Sidang',
            'jenis_seminar_id' => 'Jenis Seminar',
            'judul' => 'Judul',
            'tanggal' => 'Tanggal',
            'waktu' => 'Waktu',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute harus diisi.',
            'exists' => ':attribute tidak ditemukan.',
            'string' => ':attribute harus berupa string.',
            'uuid' => ':attribute harus berupa UUID.',
        ];  
    }

    
}
