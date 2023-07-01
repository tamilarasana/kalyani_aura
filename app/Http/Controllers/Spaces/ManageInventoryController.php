<?php

namespace App\Http\Controllers\Spaces;

use Exception;
use App\Models\User;
use App\Models\Userrole;
use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use App\Http\Requests\ManageInventoryRequest;
use Illuminate\Database\QueryException;

class ManageInventoryController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loggedUser = User::where('id','=', session('LoggedUser'))->first();
        $userrole = Userrole::where('id', $loggedUser['role_id'])->first();

        $amentites = Inventory::with('plans')->get();
        return view('Space.manageinventories.index',['amentites' => $amentites, 'loggedUser' => $loggedUser, 'userrole' => $userrole]);

        // return response()->json(['status' => 200, 'data'=> $amentites]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loggedUser = User::where('id','=', session('LoggedUser'))->first();
        $userrole = Userrole::where('id', $loggedUser['role_id'])->first();
        return view('Space.manageinventories.create',[ 'loggedUser' => $loggedUser, 'userrole' => $userrole]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManageInventoryRequest $request)
    {
        // try {
            // $data = $request->all();
            $data['title'] = $request->title;
            $data['hsn_code'] = $request->hsn_code;
            $data['res_type'] = $request->res_type;
            $inventory = Inventory::create($data);
            return redirect('manageinventories')->with('success', 'Created successfully!');
        // } catch (Exception $e) {
        //     return back()->withError($exception->getMessage())->withInput();
        //         return redirect()->back()->with('error', 'Failed to update user');

        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $loggedUser = User::where('id','=', session('LoggedUser'))->first();
        $userrole = Userrole::where('id', $loggedUser['role_id'])->first();
        $inventory = Inventory::find($id);
        return view('Space.manageinventories.show',['inventory'=>$inventory, 'loggedUser' => $loggedUser, 'userrole' => $userrole]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loggedUser = User::where('id','=', session('LoggedUser'))->first();
        $userrole = Userrole::where('id', $loggedUser['role_id'])->first();
        $inventory = Inventory::find($id);
        return view('Space.manageinventories.edit',['inventory'=>$inventory, 'loggedUser' => $loggedUser, 'userrole' => $userrole]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ManageInventoryRequest $request, $id)
    {
        $inventory = Inventory::find($id);
            if($request->has('title'))
            {
                $inventory->title = $request->title;
            }
            if($request->has('hsn_code'))
            {
                $inventory->hsn_code = $request->hsn_code;
            }
            if($request->has('res_type'))
            {
                 $inventory->res_type = $request->res_type;
            }
        $inventory->save();
        return redirect('manageinventories')->with('success', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventory = Inventory::find($id);
        $inventory->delete();
        return redirect('manageinventories')->with('success', 'Deleted successfully!');
    }
}
