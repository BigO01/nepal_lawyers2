<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class emailConformation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'f_name' => 'required|alpha_spaces',
            'l_name' => 'required|alpha_spaces',
            'email_l' => 'required|unique:users,email',
        ];
    }


    public function messages()
    {
        return [
            'email_l.required'  =>  'Email Field Is Required!!!',
        ];
    }
}
