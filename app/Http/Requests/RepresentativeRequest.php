<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RepresentativeRequest extends FormRequest
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
            'email' => 'required',
            'cnpj' => 'required|cnpj',
            'phone' => 'required',
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'Nome',
            'email' => 'Email',
            'CNPJ' => 'CNPJ',
            'phone' => 'Telefone',
        ];
    }
}
