<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class AssignWorkRequest extends Request
{
     /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             	   'client_id' => 'required',
				   'employee_id' => 'required',
				   'work_id' => 'required',
				   'start_date' => 'required',
				   'end_date' => 'required'
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
