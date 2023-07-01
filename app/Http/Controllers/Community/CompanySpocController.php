<?php

namespace App\Http\Controllers\Community;

use App\Models\CompanySpoc;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class CompanySpocController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $spoc = CompanySpoc::where('general_id', $id)->get();
       return response()->json(['status' => 200, 'data' => $spoc]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
   
        $rules = [
            'first_name'    => 'min:3',
            'last_name' => 'min:3',
            'user_name'   => 'min:3',
            'email' => 'min:1',
           
          ];
        $this->validate($request, $rules);
        $data = $request->all();
        $data['company_general_id'] = $id;
        $spoc = CompanySpoc::create($data);
        return response()->json(['status' => 200, 'data' => $spoc]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $general_id, $id)
    {
     
        $spoc = CompanySpoc::find($id);

        if($request->has('first_name'))
         {
            $spoc->first_name = $request->first_name;
        }
        
        if($request->has('last_name'))
         {
            $spoc->last_name = $request->last_name;
        }
         
         if($request->has('user_name'))
         {
            $spoc->user_name = $request->user_name;
        }
     
        if($request->has('email'))
         {
            $spoc->email = $request->email;
        }
     
        if($request->has('general_id'))
         {
            $spoc->general_id = $request->general_id;
        }
      
           $spoc->save();
           
           return response()->json(['status' => 200, 'data' => $spoc]);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
    }
}
