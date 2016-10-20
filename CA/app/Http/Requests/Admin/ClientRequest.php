<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class ClientRequest extends Request
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
				   'address' => 'required',
				   'contact_person' => 'alpha',
				   'mobile_number' => 'required|digits_between:10,12',
                   'email_id' => 'required|email|unique:client',
                   'PAN' => 'required|regex:/[A-Za-z]{5}\d{4}[A-Za-z]{1}/|size:10|unique:client',
				   'TAN' => 'required|regex:/[A-Za-z]{4}\d{5}[A-Za-z]{1}/|size:10|unique:client',
				   'TIN' => 'required|unique:client|digits:11',
				   'CIN' => 'required|regex:/[A-Za-z]{1}\d{5}[A-Za-z]{2}\d{4}[A-Za-z]{3}\d{6}/|size:21|unique:client',
				   'excise_reg_no' => 'required|regex:/[A-Za-z]{5}\d{4}[A-Za-z]{3}\d{3}/|size:15|unique:client',
				   'service_tax_reg_no' => 'required|regex:/[A-Za-z]{5}\d{4}[A-Za-z]{1}[SDsd]+\d{3}/|size:15|unique:client'
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
