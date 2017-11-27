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
            'expertise.*'     => 'required',
            'court.*'     => 'required',
            'language.*'    =>  'required',
            'service.*'       => 'required',
            'firstfee'      => 'required',
            'hourfee'       => 'required',
            'payment.*'       => 'required',
        ];
    }

        public function messages()
    {
        return [
            'yoe.required'      => 'Please fill :attribute field!',
            'firstfee.required' => 'Please fill :attribute field!',
            'hourfee.required'  => 'Please fill :attribute field!',        
        ];
    }
}
