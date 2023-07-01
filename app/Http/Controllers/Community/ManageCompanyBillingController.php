<?php

namespace App\Http\Controllers\Community;

use Illuminate\Http\Request;
use App\Models\CompanyBilling;
use App\Models\CompanyGeneral;
use App\Http\Controllers\ApiController;

class ManageCompanyBillingController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $bill = CompanyBilling::where('general_id', $id)->get();
           return response()->json(['status' => 200, 'data' => $bill]);
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
            'cin'    => 'min:3',
            'pan' => 'min:3',
            'gstn'   => 'min:3',
            'tan' => 'min:1',
            'billing_detail' => 'min:3',
          ];
        $this->validate($request, $rules);
        $data = $request->all();
        $data['company_general_id'] = $id;
        $billing = CompanyBilling::create($data);
        return response()->json(['status' => 200, 'data' => $billing]);
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
       
        $company_billing = CompanyBilling::find($id);

        if($request->has('cin'))
         {
            $company_billing->cin = $request->cin;
        }
        
        if($request->has('pan'))
         {
            $company_billing->pan = $request->pan;
        }
         
         if($request->has('gstn'))
         {
            $company_billing->gstn = $request->gstn;
        }
     
        if($request->has('tan'))
         {
            $company_billing->tan = $request->tan;
        }
     
        if($request->has('billing_address'))
         {
            $company_billing->billing_address = $request->billing_address;
        }
     
        if($request->has('lgeneral_id'))
         {
            $company_billing->general_id = $request->general_id;
        }  
           $company_billing->save();
           
          return response()->json(['status' => 200, 'data' => $company_billing]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
