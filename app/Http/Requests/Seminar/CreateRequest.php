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
            'pembimbing1' => 'required|uuid|exists:pengguna,id',
            'pembimbing2' => 'required|uuid|exists:pengguna,id',
            'penguji1' => 'required|uuid|exists:pengguna,id',
            'penguji2' => 'required|uuid|exists:pengguna,id',
            'pimpinan' => 'required|uuid|exists:pengguna,id',
            'jenis' => 'required|exists:jenis_seminar,id',
            'judul' => 'required|string',
            'draft' => 'required|mimes:zip,rar|max:51200',
            'tanggal' => 'required',
            'waktu' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'pembimbing1' => 'Pembimbing 1',
            'pembimbing2' => 'Pembimbing 2',
            'penguji1' => 'Penguji 1',
            'penguji2' => 'Penguji 2',
            'pimpinan' => 'Pimpinan Sidang',
            'jenis' => 'Jenis Seminar',
            'judul' => 'Judul',
            'draft' => 'Draft',
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
            'mimes' => ':attribute harus berupa file PDF.',
            'max' => ':attribute maksimal 50 MB.',
        ];  
    }

    
}
