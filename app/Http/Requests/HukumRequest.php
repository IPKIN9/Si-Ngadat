<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HukumRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'jenis_pelanggaran' => 'required',
            'keterangan' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Field ini tidak boleh kosong'
        ];
    }
}
