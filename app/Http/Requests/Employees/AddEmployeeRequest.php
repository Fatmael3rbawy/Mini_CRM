<?php

namespace App\Http\Requests\Employees;

use Illuminate\Foundation\Http\FormRequest;

class AddEmployeeRequest extends FormRequest
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
            'fname' =>'string |required',
            'lname' => 'string |required',
            'email' => 'email |required',
            'phone' => 'required |regex:/(01)[0-9]{9}/',
            'linkedIn_url' =>'nullable |url'
        ];
    }
}
