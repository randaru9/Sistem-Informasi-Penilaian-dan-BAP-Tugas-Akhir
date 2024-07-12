<?php

namespace App\Http\Requests\Seminar;

use Illuminate\Foundation\Http\FormRequest;

class ExportRekapNilai extends FormRequest
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
            'jenis' => 'required|exists:jenis_seminar,id',
            'tglAwal' => 'required|date',
            'tglAkhir' => 'required|date',
        ];
    }

    public function attributes(){
        return [
            'jenis' => 'Jenis',
            'tglAwal' => 'Tanggal Awal',
            'tglAkhir' => 'Tanggal Akhir',
        ];
    }

    public function messages(){
        return [
            'required' => ':attribute harus diisi',
            'exists' => ':attribute tidak ditemukan',
            'date' => ':attribute harus berupa tanggal',
        ];
    }
}
