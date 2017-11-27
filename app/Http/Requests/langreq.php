<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class langreq extends FormRequest
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
            'langname'=>'required|alpha_spaces',
			'status'=>'required',
        ];
    }
	public function messages()
	{
		return [
			'langname.required' => 'Language Name is required',
			'langname.alpha_spaces' => 'Language Name is must be Aplhabetic',
			'status.required' => 'Status is required',
		];
	}
}
