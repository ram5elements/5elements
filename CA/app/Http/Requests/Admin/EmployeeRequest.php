<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class EmployeeRequest extends Request
{
     /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [          
				   'name' => 'required|max:50|alpha',
				   'father_name' => 'alpha',
				   'address' => 'required',
				   'mobile_number' => 'required|digits_between:10,12',
                   'email_id' => 'required|email|unique:employees',
                   'password' => 'required'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
