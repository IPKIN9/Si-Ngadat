<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContohRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'contoh' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'field ini tidak boleh kosong'
        ];
    }
}
