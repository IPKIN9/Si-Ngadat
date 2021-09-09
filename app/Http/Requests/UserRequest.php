<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama' => 'required',
            'username' => 'required|unique:users,username|min:5|max:15',
            'password' => 'required|confirmed|min:5|max:15',
            'role' => 'required',
        ];
    }
    public function messages()
    {
        return[
            'required' => 'Field ini tidak boleh kosong',
            'unique' => 'Username sudah digunakan',
            'min'=> 'Isi field ini terlalu pendek',
            'max' => 'Isi field ini terlalu panjang',
            'confirmed' => 'Password tidak sama'
        ];
    }
}
