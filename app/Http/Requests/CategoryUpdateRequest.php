<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
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
            'name'=>['required',
                Rule::unique('categories', 'name')->ignore($this->category->id),
            ],
            'order_level'=>'sometimes|nullable|integer',
            'parent_id'=>'nullable',
            'status'=>'sometimes',
            'image'=>'nullable',
        ];
    }
}
