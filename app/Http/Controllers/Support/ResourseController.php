<?php

namespace App\Http\Controllers\Support;

use App\Models\Resourse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;

class ResourseController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resourse = Resourse::all();
        // return response()->json($resourse);
        return $this->showAll($resourse);
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
        'first_name'=> 'min:1',
        'user_name'=> 'min:1',
        'location_id'=> 'integer|min:1',
        'role_id' => 'integer|min:1',
        ];

        $this->validate($request, $rules);
        $data = $request->all();

        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['user_name'] = $request->user_name;
        $data['email'] = $request->email;
        $data['mobile'] = $request->mobile;
        $data['location_id'] = $request->location_id;
        $data['role_id'] = $request->role_id;
        $data['designation'] = $request->designation;
      
        $resourse = Resourse::create($data);
                    
         return response()->json(['status' => 200, 'data' => $resourse]); 
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
        //
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
