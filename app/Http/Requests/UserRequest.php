<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        
        $segment = \Request::segment(4) ? \Request::segment(4) : \Request::segment(2);
        $id = $this->method() == 'PUT' ||  $this->method() == 'PATCH' ?  $segment : 'NULL';
        
        return [
            'user_name'                     => 'required',
            'user_email'                    => 'required',
            'role_id'                       => 'required',     
            'status'                        => 'required',     
            'password'                      => 'required|confirmed|min:8',
            'password_confirmation'         => 'required_with:password|same:password|min:8'
          
        ];
    }

    public function messages()
    {
        
        return [
            'user_name.required'            => 'User Name  is required',
            'user_email.required'           => 'Email  is required',
            'role_id.required'              => 'Role  is required',
            'status.required'               => 'Status  is required',
            'password.required'          => 'Password  is required'
        ];
    }
}


