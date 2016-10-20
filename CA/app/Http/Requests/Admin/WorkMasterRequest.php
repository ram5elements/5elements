<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class WorkMasterRequest extends Request
{
     /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             	  // 'fees' => 'numeric'				
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
