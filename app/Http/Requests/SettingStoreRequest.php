<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingStoreRequest extends FormRequest
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
           'company_name'=>'required',
            'company_email'=>'required',
            'company_phone'=>'required',
            'website'=>'required',
            'logo'=>'required',
            'favicon'=>'sometimes',
            'company_address'=>'nullable',
        ];
    }
}
