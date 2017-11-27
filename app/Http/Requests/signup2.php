<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class signup2 extends FormRequest
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
            'region'                => 'required',
            'password'              => 'required|between:8,30|confirmed',
            'password_confirmation' => 'required|between:8,30',
            'checkBox'              => 'required',
            'register'              => 'required',
        ];
    }
    
    public function messages()
    {
        return [
            'password.required' => 'This field :attribute should never be blank!',
            'password_confirmation.required' => 'Please fill :attribute field!',
            'checkBox.required'   => 'Please accept Terms of conditions!',
            'register.required'   => 'Please select your Register Type!',
        ];
    }
}
