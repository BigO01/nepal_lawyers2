<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class barreq extends FormRequest
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
             
            'bname'=>'required|alpha_spaces',
			'status'=>'required',
        ];
    }
	public function messages()
	{
		return [
			'bname.required' => 'Bar Name is required',
			'bname.alpha_spaces' => 'Bar Name is must be Aplhabetic',
			'status.required' => 'Status is required',
		];
	}
}
