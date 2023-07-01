<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManageInventoryRequest extends FormRequest
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
            'title'       => 'required|string|min:5|max:40',
            'res_type'      => 'required',
            'hsn_code'      => 'required|alpha_num',          
        ];
    }

    public function messages()
    {
        return [
            'title.required'     => 'Title Name is required',
            'hsn_code.required'    => 'Hsn Code is required',
            'res_type.required'    => 'Rescorce Type is required',
         
        ];
    }
}
