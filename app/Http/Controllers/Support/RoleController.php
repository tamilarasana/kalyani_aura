<?php

namespace App\Http\Controllers\Support;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::where('status', 0)->get();
        return response()->json(['status' => 200, 'data' => $roles]);
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
    
        try 
        { 
            
            $rules = [
                'role'=>'min:2',
            ];
     
            $this->validate($request, $rules);
            $data = $request->all();
     
            $data['role'] = $request->role;
            $role = Role::create($data);
                 } 
                     catch (\Exception $error) { 
                             return response()->json([ 'status' => 500, 'data' => 'Duplicate Entry', 'error' => $error ]);
                        
                    }
                    return response()->json([ 'status' => 200, 'message' => 'Successfully Added' ]);   
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
        try 
        { 
            
            $role_update = Role::find($id);

            if($request->has('role'))
             {
                $role_update->role = $request->role;
            }
                $role_update->save();
                 } 
                     catch (\Exception $error) { 
                             return response()->json([ 'status' => 500, 'data' => 'Duplicate Entry', 'error' => $error ]);
                        
                    }
                    return response()->json([ 'status' => 200, 'data' => $role_update ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
       $role->status = '1';
       $role->save();
    return response()->json(['status' => 200, 'data' => $role]); 
    }
}
