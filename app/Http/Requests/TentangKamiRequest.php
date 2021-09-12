<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TentangKamiRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'email' => 'required',
            'telepon' => 'required|numeric',
            'alamat' => 'required',
            'deskripsi' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Field ini tidak boleh kosong',
            'numeric' => 'Field ini di isi dengan angka'
        ];
    }
}
