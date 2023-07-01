<?php

namespace App\Http\Controllers\Manageuser;

use App\Models\User;
use App\Models\Userrole;
use App\Models\Manageuser;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;

class ManageUserController extends Controller
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

        $manageuser = Manageuser::all();
        return view('Manageuser.index',['manageuser' => $manageuser, 'loggedUser' =>$loggedUser, 'userrole'=> $userrole]);

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

        $userdata = Userrole::all();
        return view('Manageuser.createoredit',['userdata'=> $userdata,'loggedUser' =>$loggedUser, 'userrole'=> $userrole]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        $data = $request->all();
        $user = Manageuser::create($data);
        return redirect('manageuser')->with('success', 'Created successfully!');
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
      $loggedUser = User::where('id','=', session('LoggedUser'))->first();
      $userrole = Userrole::where('id', $loggedUser['role_id'])->first();
      
        $manageuser = Manageuser::find($id);
        $userdata = Userrole::all();

        return view('Manageuser.createoredit',[ 'manageuser' => $manageuser,'userdata'=> $userdata,'loggedUser' =>$loggedUser, 'userrole'=> $userrole]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $manageuser = Manageuser::find($id);
        
            if($request->has('user_name'))
            {
              $manageuser->user_name = $request->user_name;
            }
            if($request->has('user_email'))
            {
              $manageuser->user_email = $request->user_email;
            }
            if($request->has('role_id'))
            {
              $manageuser->role_id = $request->role_id;
            }
            if($request->has('status'))
            {
              $manageuser->status = $request->status;
            }
            if($request->has('password'))
            {
              $manageuser->password = $request->password;
            }
        $manageuser->update();
        return redirect('manageuser')->with('success', 'Updeted successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $manageuser = User::find($id);
        // $manageuser = Manageuser::find($id);
        $manageuser->delete();
        return redirect('manageuser')->with('success', 'Deleted successfully!');
    }
}
