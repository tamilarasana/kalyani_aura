<?php

namespace App\Http\Controllers\Social;

use App\Models\Alliance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AllianceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alliance = Alliance::all();
        return response()->json($alliance);
        
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
    public function store(Request $request)
    {
        $rules = [ 
            'alligns_title' => 'required',
                  ];

                  $this->validate($request, $rules);
                  $data = $request->all();
                  $data['location'] = $request->location;
                  $data['category'] = $request->category;
                  $data['country'] = $request->country;
                  $data['thumbnail'] = $request->thumbnail;
                  $data['your_image'] = $request->your_image;

                  $event = Alliance::create($data);
                  return response()->json($event);
    
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
    public function update(Request $request, $id)
    {
        $alliance = Alliance::find($id);

        if($request->has('alligns_title'))
         {
            $alliance->alligns_title = $request->alligns_title;
        }
        
        if($request->has('thumbnail'))
         {
            $alliance->thumbnail = $request->thumbnail;
        }
         
         if($request->has('description'))
         {
            $alliance->description = $request->description;
        }
     
        if($request->has('your_image'))
         {
            $alliance->your_image = $request->your_image;
        }
     
        if($request->has('category'))
         {
            $alliance->category = $request->category;
        }
        if($request->has('offer_type'))
        {
           $alliance->offer_type = $request->offer_type;
       }
    
       if($request->has('coupen_code'))
        {
           $alliance->coupen_code = $request->coupen_code;
       }
       if($request->has('email'))
       {
          $alliance->email = $request->email;
      }
      if($request->has('weburl'))
      {
         $alliance->weburl = $request->weburl;
     }
  
     if($request->has('status'))
      {
         $alliance->status = $request->status;
     }
     if($request->has('country'))
     {
        $alliance->country = $request->country;
    }
   
        $alliance->save();
        return response()->json($alliance);   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alliance = Alliance::find($id);
        $alliance->delete();
        return response()->json($alliance);
    }
}
