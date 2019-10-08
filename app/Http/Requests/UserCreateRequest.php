<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'is_admin' => 'required',
            'profile_id' => 'required',
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'Nome',
            'username' => 'Usuario',
            'email' => 'Email',
            'is_admin' => 'Admin',
            'status' => 'Status',
            'password' => 'Senha',
            'password_confirmation' => '',
            'profile_id' => 'Perfil',
        ];
    }
}
