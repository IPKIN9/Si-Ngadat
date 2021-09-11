<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'desa_id' => 'required|integer',
            'hukum_id' => 'required|integer',
            'nik' => 'required|numeric',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'umur' => 'required|numeric',
            'gender' => 'required',
            'isi_perjanjian' => 'required',
            'keterangan' => 'required',
            'ttd' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Wajib diisi',
            'integer' => 'Data tidak valid',
            'numeric' => 'Data harus berbentuk angka'
        ];
    }
}
