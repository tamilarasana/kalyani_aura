<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManagePlanRequest extends FormRequest
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
            'inventory_id'          => 'required',
            'location'              => 'required',
            'description'           => 'required|max:255',          
            'resource_price'        => 'required|alpha_num|min:1|max:5',          
            'num_seats'             => 'required|alpha_num',          
            'area'                  => 'required',          
            'meeting_room_credits'  => 'required|alpha_num',          
            'printer_credits'       => 'required|alpha_num'          
        ];
    }

    public function messages()
    {
        return [
            'inventory_id.required'          => 'Rescorce Type is required',
            'location.required'              => 'Location  is required',
            'description.required'           => 'Description  is required',
            'resource_price.required'        => 'Resource price  is required',
            'num_seats.required'             => 'Seats  is required',
            'area.required'                  => 'Area  is required',
            'meeting_room_credits.required'  => 'Meeting Room Credits  is required',
            'printer_credits.required'        => 'Printer Credits  is required',
         
        ];
    }
}

