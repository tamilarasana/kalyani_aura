<?php

namespace App\Http\Controllers\Community;

use App\Models\CompanyKyc;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class CompanyKycController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'kyc_document_name' => 'min:3',
          ];

        $this->validate($request, $rules);
        $data = $request->all();
        $data['company_general_id'] = $id;
        if($request->has('file'))
        { 
           $data['file'] = $request->file->store('public');
        }
      
        $kyc = CompanyKyc::create($data);
        return response()->json(['status' => 200, 'data' => $kyc]);
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
        
        $kyc = CompanyKyc::find($id);

        if($request->has('kyc_document_name'))
         {
            $kyc->kyc_document_name = $request->kyc_document_name;
        }
        
        if($request->has('file'))
         {
            $kyc->file = $request->file;
        }
         
        if($request->has('general_id'))
         {
            $kyc->general_id = $request->general_id;
        }

           $kyc->save(); 

            return response()->json(['status' => 200, 'data' => $kyc]);
        //   return response()->json($kyc);   

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($g_id, $u_id)
    {
       $kyc = CompanyKyc::findOrFail($u_id);
        $kyc -> delete();
 
         return response()->json(['status' => 200, 'data' => $kyc]); 
    }
}
