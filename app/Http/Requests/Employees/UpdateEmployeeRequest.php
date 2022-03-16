<?php

namespace App\Http\Requests\Employees;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
            'phone' => 'regex:/(01)[0-9]{9}/ |required',
            'linkedIn_url' =>'nullable |url'
        ];
    }
}
