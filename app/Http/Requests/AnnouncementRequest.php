<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnouncementRequest extends FormRequest
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
            'title'                    => 'required|min:5',
            'location'                 => 'required',
            'image'                    => 'required|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000,'.$id.',id|image',         
            // 'image'                    => 'required|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000,'.$id.',id|image',         
            'schedule_time'            => 'required ',          
            'schedule_date'            => 'required',          
            'expiration_time'          => 'required',          
            'expiration_date'          => 'required',          
            'message'                  => 'required'         
        ];
    }

    public function messages()
    {
        return [
            'title.required'           => 'Title is required',
            'location.required'        => 'Location  is required',
            'image.required'           => 'Image  is required',
            'schedule_time.required'   => 'Schedule Time  is required',
            'schedule_date.required'   => 'Schedule date  is required',
            'expiration_time.required' => 'Expiration Time  is required',
            'expiration_date.required' => 'Expiration Date is required',
            'message.required'         => 'Message is required'

        ];
    }
}



