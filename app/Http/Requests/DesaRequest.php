<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DesaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama_desa' => 'required',
            'lokasi' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'field ini todak boleh kosong'
        ];
    }
}
