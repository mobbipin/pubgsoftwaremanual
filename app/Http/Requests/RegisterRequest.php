<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
             'email' => 'required|email|unique:users,email',
            'name' => 'required|unique:users,name',
            'username' => 'required|unique:users,username',
            'password'=>['required',
            'confirmed',
            Password::min(8)->letters()->numbers()->mixedCase()->uncompromised() ],
            'phone' => 'nullable',
            'city' => 'nullable',
            'address' => 'nullable',
        ];
    }
}
