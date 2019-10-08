<?php

namespace App\Http\Requests;

class ResetPasswordRequest extends AbstractRequest
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
            'token' => 'required',
            'password' => 'required|min:8|required_with:password_confirmation|same:password_confirmation|regex:/[0-9]/|regex:/[@$!%*#?&]/',
            'password_confirmation' => 'required',
        ];
    }
}