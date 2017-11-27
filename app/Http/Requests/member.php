<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class member extends FormRequest
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
            'new_img'  => 'mimes:jpeg,jpg,png|max:5000',
            'mobile' => 'required',
            'address' => 'required',
            'state' => 'required',
            // 'district' => 'required',
            'city' => 'required',
            'gender' => 'required',
                    ];
    }

    public function messages()
    {
        return [
            'new_img.mimes'     => 'The Image should be jpeg, jpg or png extentions!',
            'new_img.max'       => 'The Image should be less then 5mb size!',
            'last_name'        =>  'The :attribute should be alpha!',
            'mobile.required'   => 'The :attribute should be Given!',
            'address.required' => 'Please fill :attribute field!',
            'state.required' => 'Please fill :attribute field!',
            'district.required' => 'Please fill :attribute field!',
            'city.required' => 'Please fill :attribute field!',
            'gender.required' => 'Please fill :attribute field!',
        ];
    }
}
