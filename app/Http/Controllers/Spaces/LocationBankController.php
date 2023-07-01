<?php

namespace App\Http\Controllers\Spaces;

use App\Models\LocationBank;
use Illuminate\Http\Request;
use App\Models\LocationBilling;
use App\Models\LocationGeneral;
use App\Http\Controllers\ApiController;

class LocationBankController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(LocationGeneral $locate)
    {
        $loggedUser = User::where('id','=', session('LoggedUser'))->first();
        $userrole = Userrole::where('id', $loggedUser['role_id'])->first();
        $bank = LocationBank::where('location_general_id', $locate->id)->get();
           return response()->json(['status' => 200, 'data' => $bank, 'loggedUser' =>$loggedUser, 'userrole' => $userrole]);
        // return response()->json($bank);
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
    public function store(Request $request, LocationGeneral $locate)
    {
    $rules = [
            'bank_name'           => 'min:3',
            'account_number'         => 'min:3',
            // 'benificiary_name'    => 'min:3',
            // 'ifsc_code'           => 'min:3',
            // 'branch'              => 'min:3',
            // 'location_general_id' => 'min:3',
          ];  
       $this->validate($request, $rules);
       $data = $request->all();
       $data['location_general_id'] = $locate->id;
       $bank = LocationBank::firstOrCreate($data);
        return response()->json(['status' => 200, 'data' => $bank]);
    //   return response()->json($bank);
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
    public function update(Request $request, LocationGeneral $locate, $id)
    {
    
   $bank = LocationBank::find($id);

   if($request->has('bank_name'))
    {
       $bank->bank_name = $request->bank_name;
   }
   
   if($request->has('account_num'))
    {
       $bank->account_num = $request->account_num;
   }
    
    if($request->has('benificiary_name'))
    {
       $bank->benificiary_name = $request->benificiary_name;
   }

   if($request->has('ifsc'))
    {
       $bank->ifsc = $request->ifsc;
   }

   if($request->has('branch'))
    {
       $bank->branch = $request->branch;
   }

   if($request->has('location_general_id'))
    {
       $bank->location_general_id = $request->location_general_id;
   }

      $bank->save();
         return response()->json(['status' => 200, 'data' => $bank]);
    //   return response()->json($bank);   
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
