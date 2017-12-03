<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class professional extends FormRequest
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
            'yoe'           => 'required',
            'expertise'     => 'required',
//            'expertise.*'     => 'required',
            'court'     => 'required',
//            'court.*'     => 'required',
            'language'    =>  'required',
//            'language.*'    =>  'required',
            'service'       => 'required',
//            'service.*'       => 'required',
            'firstfee'      => 'required',
            'hourfee'       => 'required',
//            'payment.*'       => 'required',
            'payment'       => 'required',
        ];
    }

        public function messages()
    {
        return [
            'yoe.required'      => 'Please fill year of experience field!',
            'firstfee.required' => 'Please fill first fee field!',
            'hourfee.required'  => 'Please fill hour fee field!',
        ];
    }
}
