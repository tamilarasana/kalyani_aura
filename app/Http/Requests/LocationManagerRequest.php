<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationManagerRequest extends FormRequest
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
            'location_name'       => 'required|alpha|min:5|max:40|regex:/^[a-zA-Z.Ññ\s]+$/',
            'contact_number'      => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            // 'project_name'            => 'required|unique:project_models,project_name,'.$id.',id,deleted_at,NULL|alpha_num|min:3|max:35',

            'email'               => 'required|unique:location_generals,email,'.$id.',id|email',
            'seating_capacity'    => 'required|numeric',
            'area'                => 'required',
            'business_hours_s'    => 'required',
            'business_hours_e'    => 'required',

            'legal_business_name' => 'required|string|min:5|max:40',
            'address'             => 'required|string|min:5|max:120',
            'notes_top'           => 'required|string',
            'notes_bottom'        => 'required|string',
            'gstn'                => 'required|string',
            'state'               => 'required|string',
            'city'                => 'required|string',

            'bank_name'           => 'required|string',
            'account_number'      => 'required|numeric|unique:location_banks,account_number,'.$id.',id|min:35',            
            'benificiary_name'    => 'required',
            'ifsc'                => 'required|alpha_num'
            
        ];
    }

    public function messages()
    {
        return [
            'location_name.required'     => 'Location Name is required',
            'email.required'             => 'Email  is required',
            'email.unique'               => 'The E-mail provided is already taken',
            'contact_number.required'    => 'Contact Number is required',
            'seating_capacity.required'  => 'Seating Capacity is required',
            'area.required'              => 'Area is required',
            'business_hours_s.required'  => 'Please Enter Time',
            'business_hours_er.required' => 'The end time must be greater than initial time.',
            'notes_top.required'         => 'Notes Top is required',
            'notes_bottom.required'      => 'Notes Bottom is required',
            'gstn.required'              => 'Gstn is required', 
            'state.required'             => 'State Bottom is required', 
            'city.required'              => 'City is required',
            'bank_name.required'         => 'Bank  Name is required',
            'account_number.required'    => 'Account Number is required',
            'account_number.unique'      => 'The Account  Number is alredy taken',
            'benificiary_name.required'  => 'Benificiary is required',
            'ifsc.required'              => 'Ifsc is required'
        ];
    }
}
