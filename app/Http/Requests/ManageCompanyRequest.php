<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManageCompanyRequest extends FormRequest
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

          
            'company_name'               => 'required|alpha_num|max:255',  
            'company_email'              => 'required|unique:company_generals,company_email,'.$id.',id|email',
            'contact_number'             => 'required|numeric',          
            'web_url'                    => 'required',          
            'reference'                  => 'required|regex:/^[a-zA-Z0-9\-_\s]+$/u', 
            'location'                   => 'required',     

            'first_name'                 => 'required|string',           
            'last_name'                  => 'required|string',           
            'user_name'                  => 'required|string', 
         
            'email'                      => 'required|unique:company_spocs,email,'.$id.',id|email',

            'cin'                        => 'required|alpha_num|unique:company_billings,cin,'.$id.',id|min:2',          
            'pan'                        => 'required|alpha_num|unique:company_billings,pan,'.$id.',id|min:2',
            'gstn'                       => 'required|alpha_num|unique:company_billings,gstn,'.$id.',id|min:2',       
            'tan'                        => 'required|alpha_num|unique:company_billings,tan,'.$id.',id|min:2',                   
            'billing_address'            => 'required|string',          

            'kyc_document_name'          => 'required|alpha_num',  
            'file'                       => 'nullable|image|mimes:jpg,png,gif|max:2048'  
        ];
    }
 
    public function messages()
    {
        return [
            'company_name.required'      => 'Company Name is required',
            'company_email.required'     => 'Email  is required',
            'company_email.unique'       => 'The Email provided is already taken',
            'contact_number.required'    => 'Numbar  is required',
            'web_url.required'           => 'URL  is required',
            'reference.required'         => 'Reference  is required',
            'location.required'          => 'Location  is required',

            'first_name.required'        => 'First Name Credits  is required',
            'last_name.required'         => 'Last Name Credits  is required',
            'user_name.required'         => 'User Name Credits  is required',
            'email.required'             => 'Email is required',

            'cin.required'               => 'CIN Credits  is required',
            'cin.unique'                 => 'The CIN  is alredy taken',
            'pan.required'               => 'PAN Credits  is required',
            'pan.unique'                 => 'The PAN Credits  provided is already taken',
            'gstn.required'              => 'GSTN Credits  is required',
            'gstn.unique'                => 'The GSTN Credits  provided is already taken',
            'tan.required'               => 'TAN Credits  is required',
            'tan.unique'                 => 'The TAN Credits  provided is already taken',
            'billing_address.required'   => 'Billing Address is required',
            
            'kyc_document_name.required' => 'Kyc Document   is required',        
            'file.required'              => 'File  is required'         
        ];
    }

   
}

