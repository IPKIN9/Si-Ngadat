<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'username' => 'required|min:5|max:50',
            'password' => 'required|min:4|max:100'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Field harus diisi',
            'username.min' => 'Username minimal 5',
            'uname.max' => 'Username maksimal 50',
            'password.min' => 'Username minimal 4',
            'password.max' => 'Username maksimal 100',
        ];
    }
}
