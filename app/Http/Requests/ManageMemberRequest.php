<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManageMemberRequest extends FormRequest
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
            'first_name'               => 'required|alpha',
            'last_name'                => 'required|alpha',
            'name'                     => 'required|alpha',          
            'email'                    => 'required|email|unique:users,email',          
            'mobile'                   => 'required||numeric|unique:users,mobile',   
            'work_station'             => 'required|alpha_num', 
            'working_company'          => 'required|string',          
            'designation'              => 'required|string',          
            'password'                 => 'required|confirmed|min:2',
            'password_confirmation'    => 'required_with:password|same:password|min:2'        
        ];
    }

    public function messages()
    {
        return [
            'first_name.required'      => 'First Name  is required',
            'last_name.required'       => 'Last Name  is required',
            'name.required'            => 'Name is required',
            'email.required'           => 'Email is required',
            'email.unique'             => 'The Email provided is already taken',
            'mobile.required'          => 'Mobile is required',
            'mobile.unique'            => 'The Mobile  provided is alredy taken',
            'work_station.required'    => 'Work Location  is required',
            'working_company.required' => 'Working Company  is required',
            'designation.required'     => 'Designation  is required',
            'password.required'        => 'Password  is required'
        
        ];
    }
}

