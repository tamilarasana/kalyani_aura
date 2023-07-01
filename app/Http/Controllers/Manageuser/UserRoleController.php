<?php

namespace App\Http\Controllers\Manageuser;

use App\Models\User;
use App\Models\Userrole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserRoleController extends Controller
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

        $userdata = Userrole::all();
        return view('Manageuser.Role.index',['userdata'=> $userdata,'loggedUser' =>$loggedUser, 'userrole'=> $userrole]);
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

        return view('Manageuser.Role.createoredit',['loggedUser' =>$loggedUser, 'userrole'=> $userrole]);

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
            'role_name' => 'required',
            'status' => 'required',         
        ];

        $this->validate($request, $rules);
        $data = $request->all();
        $user = Userrole::create($data);
        return redirect('userdata')->with('success', 'Created successfully!');
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

        $user_role = Userrole::find($id);
        return view('Manageuser.Role.editpermission',['user_role' => $user_role,'loggedUser'=> $loggedUser, 'userrole' => $userrole]);
        
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

        $user_role = Userrole::find($id);
        return view('Manageuser.Role.createoredit',['user_role' => $user_role, 'loggedUser' => $loggedUser, 'userrole' => $userrole]);
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
        $user_role = Userrole::find($id);

     
       
            // if($request->has('role_name'))
            // {
            //   $user_role->role_name = $request->role_name;
            // }

            // if($request->has('status'))
            // {
            //   $user_role->status = $request->status;
            // }

            // if($request->has('open_dashboard'))
            // {
            //   $user_role->open_dashboard = $request->open_dashboard;
            // }

            if($request->has('open_dashboard')){
                // if($request->open_dashboard != null){
                $user_role->open_dashboard = 'Yes';;
            }else{
                $user_role->open_dashboard = 'No';
            }
            
            if($request->has('open_visitor_log'))
            {
                $user_role->open_visitor_log = 'Yes';;
            }else{
                $user_role->open_visitor_log = 'No';
            }

            if($request->has('add_visitor'))
            { 
                $user_role->add_visitor = 'Yes';;
            }else{
                $user_role->add_visitor = 'No';
            }

            if($request->has('view_visitor'))
            {
                $user_role->view_visitor = 'Yes';;
            }else{
                $user_role->view_visitor = 'No';
            }

            if($request->has('edit_visitor'))
            {
                $user_role->edit_visitor = 'Yes';;
            }else{
                $user_role->edit_visitor = 'No';
            }

            if($request->has('delete_visitor'))
            {
                $user_role->delete_visitor = 'Yes';;
            }else{
                $user_role->delete_visitor = 'No';
            }

            if($request->has('open_visitor_timeline'))
            {
                $user_role->open_visitor_timeline = 'Yes';;
            }else{
                $user_role->open_visitor_timeline = 'No';
            }

            if($request->has('open_reason_for_visit'))
            {
                $user_role->open_reason_for_visit = 'Yes';;
            }else{
                $user_role->open_reason_for_visit = 'No';
            }

            if($request->has('add_reason'))
            {
                $user_role->add_reason = 'Yes';;
            }else{
                $user_role->add_reason = 'No';
            }

            if($request->has('delete_reason'))
            {
                $user_role->delete_reason = 'Yes';;
            }else{
                $user_role->delete_reason = 'No';
            }

            if($request->has('import_reason'))
            {
                $user_role->import_reason = 'Yes';;
            }else{
                $user_role->import_reason = 'No';
            }
            
            if($request->has('export_reason'))
            {
                $user_role->export_reason = 'Yes';;
            }else{
                $user_role->export_reason = 'No';
            }

            if($request->has('open_visitor_kiosk'))
            {
                 $user_role->open_visitor_kiosk = 'Yes';;
            }else{
                $user_role->open_visitor_kiosk = 'No';
            }

            if($request->has('open_user_page'))
            {
                $user_role->open_user_page = 'Yes';;
            }else{
                $user_role->open_user_page = 'No';
            }

            if($request->has('add_user'))
            {
                $user_role->add_user = 'Yes';;
            }else{
                $user_role->add_user = 'No';
            }

            if($request->has('edit_user'))
            {
                $user_role->edit_user = 'Yes';;
            }else{
                $user_role->edit_user = 'No';
            }

            if($request->has('delete_user'))
            {
                $user_role->delete_user = 'Yes';;
            }else{
                $user_role->delete_user = 'No';
            }

            if($request->has('open_user_role'))
            {
                $user_role->open_user_role = 'Yes';;
            }else{
                $user_role->open_user_role = 'No';
            }

            if($request->has('add_role'))
            {
                $user_role->add_role = 'Yes';;
            }else{
                $user_role->add_role = 'No';
            }

            if($request->has('edit_role'))
            {
                $user_role->edit_role = 'Yes';;
            }else{
                $user_role->edit_role = 'No';
            }

            if($request->has('set_permission'))
            {
                $user_role->set_permission = 'Yes';;
            }else{
                $user_role->set_permission = 'No';
            }

            if($request->has('delete_role'))
            {
                $user_role->delete_role = 'Yes';;
            }else{
                $user_role->delete_role = 'No';
            }

            if($request->has('open_setting'))
            {
                $user_role->open_setting = 'Yes';;
            }else{
                $user_role->open_setting = 'No';
            }

            if($request->has('update_setting'))
            {
                $user_role->update_setting = 'Yes';;
            }else{
                $user_role->update_setting = 'No';
            }

        $user_role->update();
        return redirect('userdata')->with('success', 'Updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_role = Userrole::find($id);
        $user_role->delete();
        return redirect('userdata')->with('success', 'Deleted successfully!');
    }
}