<?php

namespace App\Http\Controllers\Spaces;

use Exception;
use Illuminate\Http\Request;
use App\Models\LocationBilling;
use App\Models\LocationGeneral;
use App\Http\Controllers\ApiController;

class LocationBillingController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(LocationGeneral $locate)
    {
         $billing = LocationBilling::where('location_general_id', $locate->id)->get();
        return response()->json(['status' => 200, 'data' => $billing]);
        
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
            'legal_business_name' => 'min:3',
            'address'             => 'min:3',
            'notes_top'           => 'min:3',
            'notes_bottom'        => 'min:3',
            'gstn'                => 'min:3',
          ];
       $this->validate($request, $rules);
       $data = $request->all();

       $data['location_general_id'] = $locate->id;
       $billing = LocationBilling::firstOrCreate($data);
    
        // return response()->json($billing);
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
    public function update(Request $request, LocationGeneral $locate, $id)
    {
       $billing = LocationBilling::find($id);

   if($request->has('legal_business_name'))
    {
       $billing->legal_business_name = $request->legal_business_name;
   }
   
   if($request->has('address'))
    {
       $billing->address = $request->address;
   }
    
    if($request->has('notes_top'))
    {
       $billing->notes_top = $request->notes_top;
   }

   if($request->has('notes_bottom'))
    {
       $billing->notes_bottom = $request->notes_bottom;
   }

   if($request->has('gstn'))
    {
       $billing->gstn = $request->gstn;
   }

   if($request->has('state'))
    {
       $billing->state = $request->state;
   }

   if($request->has('city'))
    {
       $billing->city = $request->city;
   }

   if($request->has('location_general_id'))
    {
       $billing->location_general_id = $request->location_general_id;
   }

      $billing->save();
      
    return response()->json(['status' => 200, 'data' => $billing]);
    //   return response()->json($billing);   
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
