<?php

namespace App\Http\Controllers\Support;

use Exception;
use App\Models\Role;
use App\Models\User;
use App\Models\Member;
use App\Models\Userrole;
use App\Mail\MemberCreated;
use App\Models\Supportscope;
use Illuminate\Http\Request;
use App\Models\CompanyGeneral;
use App\Mail\ManageTeamCreated;
use App\Models\LocationGeneral;
use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ManageTeamRequest;

class ManageTeamController extends Controller
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

        $teams = Member::where('status', 0)->get();
        return view('SupportTeam.manageteam.index',['teams' => $teams, 'loggedUser' => $loggedUser ,'userrole' => $userrole]);
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

        $location = LocationGeneral::where('status', 0)->get();
        $scopes = Supportscope::all();
        $roles = Role::where('status', 0)->get();
        // $roles = Role::all();
        return view('SupportTeam.manageteam.create',['location' => $location,'scopes' => $scopes,'roles' => $roles, 'loggedUser' => $loggedUser ,'userrole' => $userrole]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManageTeamRequest $request)
    {
      
       
        // try { 
        $team = new Member;
        $team->password = bcrypt($request->password);
        $team->first_name= $request->first_name;
        $team->last_name = $request->last_name;
        $team->user_name = $request->user_name;
        $team->email = $request->email;
        $team->mobile = $request->mobile;
        $team->work_station = $request->work_station;
        $team->designation = $request->designation;
        $team->scope_id = $request->scope_id;
         if($request->has('spoc'))
        {
            $team->spoc = $request->spoc;
            }
        $team->save();
        
        
        // }catch(Exception $e){
        //     // if ($e->getCode() == 23000) {
        //         return redirect()->back()->with('error', 'The email provided is already taken.')->withInput();
        //     // }

        // } 
        return redirect('manageteam')->with('success', 'Created successfully!');

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

        $team = Member::find($id);
        $location = LocationGeneral::where('status', 0)->get();
        $scopes = Supportscope::all();
        $roles = Role::where('status', 0)->get();
        return view('SupportTeam.manageteam.show',['team' => $team,'location' => $location,'scopes' => $scopes,'roles' => $roles, 'loggedUser' => $loggedUser ,'userrole' => $userrole]);
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
        $team = Member::find($id);
        $location = LocationGeneral::where('status', 0)->get();
        $scopes = Supportscope::all();
        $roles = Role::where('status', 0)->get();
        return view('SupportTeam.manageteam.edit',['team' => $team,'location' => $location,'scopes' => $scopes,'roles' => $roles, 'loggedUser' => $loggedUser ,'userrole' => $userrole]);
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
            $team = Member::find($id);

        if($request->has('first_name'))
         {
            $team->first_name = $request->first_name;
        }
        
        if($request->has('last_name'))
         {
            $team->last_name = $request->last_name;
        }
         
         if($request->has('user_name'))
         {
            $team->user_name = $request->user_name;
        }
        
         if($request->has('email'))
         {
            $team->email = $request->email;
        }
        
        if($request->has('work_station'))
         {
            $team->work_station = $request->work_station;
        }
        
        // if($request->has('role_id'))
        //  {
        //     $team->role = $request->role_id;
        // }
         
         if($request->has('mobile'))
         {
            $team->mobile = $request->mobile;
        }
     
        if($request->has('scope_id'))
         {
            $team->scope_id = $request->scope_id;
        }
        if($request->has('spoc'))
         {
            $team->spoc = $request->spoc;
        }
        
        if($request->has('designation'))
         {
            $team->designation = $request->designation;
        }
     
        $team->update();
        return redirect('manageteam')->with('success', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Member::find($id);
       $team->status = '1';
       $team->save();
       return redirect('manageteam')->with('success', 'Deleted successfully!');

    }
}
