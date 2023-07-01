<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckinRequest extends FormRequest
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
            'first_name'                    => 'required',
            'last_name'                     => 'required',
            'reason_for_visit'              => 'required',          
            'visitor_from'                  => 'required',          
            'date_check_in'                 => 'required|date',          
            // 'time_check_in'                 => 'required|timezone'          
        ];
    }

    public function messages()
    {
        return [

            'first_name.required'           => 'First Name is required',
            'last_name.required'            => 'Last Name  is required',
            'reason_for_visit.required'     => 'Reason For Visit Name  is required',
            'visitor_from.required'           => 'Visitor From  is required',
            'date_check_in.required'              => 'Time  is required',
            // 'time_check_in.required'             => 'Time   is required'
         
        ];
    }
}



