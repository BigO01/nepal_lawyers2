<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class courtreq extends FormRequest
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
            'cname'=>'required|alpha_spaces',
			'status'=>'required',
        ];
    }
	public function messages()
	{
		return [
			'cname.required' => 'Court Name is required',
			'cname.alpha_spaces' => 'Court Name is must be Aplhabetic',
			'status.required' => 'Status is required',
		];
	}
}
