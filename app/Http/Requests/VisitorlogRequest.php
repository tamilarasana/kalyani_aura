<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisitorlogRequest extends FormRequest
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
            'reason_for_visit'              => 'required|alpha_num|max:255',          
            'visit_from'                    => 'required|alpha_num',          
            'date'                          => 'required|date',          
            'time_in'                       => 'required',          
            'time_out'                      => 'required'     
        ];
    }

    public function messages()
    {
        return [

            'first_name.required'           => 'First Name is required',
            'last_name.required'            => 'Last Name  is required',
            'reason_for_visit.required'     => 'Reason For Visit Name  is required',
            'visit_from.required'           => 'Visitor From  is required',
            'date.required'                 => 'Date is required',
            'time_in.required'              => 'Time  is required',
            'time_out.required'             => 'Time   is required',
         
        ];
    }
}



