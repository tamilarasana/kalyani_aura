<?php

namespace App\Http\Controllers\Spaces;

use Illuminate\Http\Request;
use App\Models\LocationGeneral;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;

class LocationGeneralController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
        {
        $location = LocationGeneral::with('billing', 'bank')->where('status', 0)->get();

            return response()->json(['status' => 200, 'data' => $location]);
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'location_name'    => 'min:3',
            'area'             => 'min:3',
            'contact_number'   => 'min:3',
            'email'            => 'min:3',
          ];
        $this->validate($request, $rules);
    
        $data = $request->all();
        $data['seating_capacity'] = $request->seating_capacity;
    
        $general = LocationGeneral::create($data);
    
        return response()->json(['status'=>200, 'data' => $general]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $location = LocationGeneral::findOrFail($id);
       return response()->json(['status'=>200, 'data' => $location]);
    }

     public function locations()
        {
        $location = LocationGeneral::all();
            return response()->json(['status' => 200, 'data' => $location]);
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
    public function update(Request $request,LocationGeneral $location_general, $id)
    {
        $location_general = LocationGeneral::find($id);

   if($request->has('location_name'))
    {
       $location_general->location_name = $request->location_name;
   }
   
   if($request->has('seating_capacity'))
    {
       $location_general->seating_capacity = $request->seating_capacity;
   }
    
    if($request->has('area'))
    {
       $location_general->area = $request->area;
   }

   if($request->has('contact_number'))
    {
       $location_general->contact_number = $request->contact_number;
   }

   if($request->has('email'))
    {
       $location_general->email = $request->email;
   }
   
   $location_general->save();
   return response()->json(['status'=>200, 'data' => $location_general]);
//   return $this->showOne($location_general);   
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //  $general = LocationGeneral::find($id);
        // $general->delete();
        // return response()->json($general);
        $location_general = LocationGeneral::find($id);
       $location_general->status = '1';
       $location_general->save();
//   return $this->showOne($location_general); 

        return response()->json(['status'=>200, 'data' => $location_general]);
    }
}
