<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManageTeamRequest extends FormRequest
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
            'first_name'                    => 'required|string',
            'last_name'                     => 'required|string',
            'user_name'                     => 'required|string',          
            'email'                         => 'required|email|unique:members,email',          
            'mobile'                        => 'required|unique:members,mobile|min:10',          
            'work_station'                  => 'required',          
            'scope_id'                      => 'required',          
            'designation'                   => 'required',
            'password'                      => 'required|confirmed|min:8',
            'password_confirmation'         => 'required_with:password|same:password|min:8'
          
        ];
    }

    public function messages()
    {
        
        return [
            'first_name.required'           => 'First Name is required',
            'last_name.required'            => 'Last Name  is required',
            'user_name.required'            => 'User Name  is required',
            'email.required'                => 'The Email is required',
            'email.unique'                  => 'The Email provided is already taken',
            'mobile.required'               => 'Mobile is required',
            'mobile.unique'                 => 'The Mobile  provided is alredy taken',
            'work_station.required'         => 'Work Station  is required',
            'scope_id.required'             => 'Scope  is required',
            'designation.required'          => 'Designation  is required',
            'password.required'             => 'Password  is required'
        ];
    }
}


