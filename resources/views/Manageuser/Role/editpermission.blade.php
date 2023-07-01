@extends('layouts.dashboard')
@section('title')
    Kalyani Aura
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                {{-- <h2 class="page-title">Edit Permissions</h2> --}}

                <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong class="card-title">Edit Permissions</strong>
                    </div>
                    <div class="card-body">
                        {{-- <form class="needs-validation" novalidate> --}}
                            <form action="{{route('userrole.update', $user_role->id)}}" method = "post" class="needs-validation" novalidate>
                                {{csrf_field()}}
                                @method('PUT')
                            <div class="form-row mb-2 ">
                                <div class=" card-title mb-2">
                                    <strong class="mb-3">Dashboard</strong>
                                </div>
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" name="open_dashboard" value="Yes" {{ $user_role->open_dashboard=="Yes"? 'checked':'' }}  class="custom-control-input" id="opendashboard">
                                        <label class="custom-control-label" for="opendashboard">Open
                                            dashboard page</label>
                                    </div>
                                </div>
                                <div class=" card-title mb-2">
                                    <strong class="mb-3">Visitor Logs</strong>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" name="open_visitor_log"   value="Yes" {{ $user_role->open_visitor_log=="Yes"? 'checked':'' }} class="custom-control-input" id="openvisitor"
                                            >
                                        <label class="custom-control-label" for="openvisitor">Open visitor
                                            logs page</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 pl-3">
                                    <div class="custom-control custom-switch ">
                                        <input type="checkbox" class="custom-control-input" name="add_visitor"   value="Yes" {{ $user_role->add_visitor=="Yes"? 'checked':'' }}  id="addvisitor" >
                                        <label class="custom-control-label" for="addvisitor">Add Visitor</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 pl-3">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="viewvisitor"   value="Yes" {{ $user_role->view_visitor=="Yes"? 'checked':'' }}    name="view_visitor">
                                        <label class="custom-control-label" for="viewvisitor">View Visitor</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 pl-3">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="editvistor"   value="Yes" {{ $user_role->edit_visitor=="Yes"? 'checked':'' }}  name="edit_visitor">
                                        <label class="custom-control-label" for="editvistor">Edit Visitor</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3 pl-3">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="deletevisitor"  value="Yes" {{ $user_role->delete_visitor=="Yes"? 'checked':'' }}  name="delete_visitor">
                                        <label class="custom-control-label" for="deletevisitor">Delete Visitor</label>
                                    </div>
                                </div>
                                <div class=" card-title mb-2">
                                    <strong class="mb-3">Visitor Timeline</strong>
                                </div>
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="openvisitortimeline" 
                                             name="open_visitor_timeline"  value="Yes" {{ $user_role->open_visitor_timeline=="Yes"? 'checked':'' }} >
                                        <label class="custom-control-label" for="openvisitortimeline">Open visitor
                                            timeline page</label>
                                    </div>
                                </div>
                                <div class=" card-title mb-2">
                                    <strong class="mb-3">Reason for Visits</strong>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="openreason" value="Yes" {{ $user_role->open_reason_for_visit=="Yes"? 'checked':'' }}  name="open_reason_for_visit"
                                            >
                                        <label class="custom-control-label" for="openreason">Open reason for
                                            visits page</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2  pl-3">
                                    <div class="custom-control custom-switch ">
                                        <input type="checkbox" class="custom-control-input" id="addreason" value="Yes" {{ $user_role->add_reason=="Yes"? 'checked':'' }}  name="add_reason">
                                        <label class="custom-control-label" for="addreason">Add Reason</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 pl-3">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="deletereason"  value="Yes" {{ $user_role->delete_reason=="Yes"? 'checked':'' }}  name="delete_reason">
                                        <label class="custom-control-label" for="deletereason">Delete Reason</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 pl-3">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="importreason"  value="Yes" {{ $user_role->import_reason=="Yes"? 'checked':'' }}  name="import_reason" >
                                        <label class="custom-control-label" for="importreason">Import Reason</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3 pl-3">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="exportreason"  value="Yes" {{ $user_role->export_reason=="Yes"? 'checked':'' }}     name="export_reason">
                                        <label class="custom-control-label" for="exportreason">Export Reason</label>
                                    </div>
                                </div>
                                <div class=" card-title mb-2">
                                    <strong class="mb-3">Visitor Kiosk</strong>
                                </div>
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="openvisitorkiosk" value="Yes" {{ $user_role->open_visitor_kiosk=="Yes"? 'checked':'' }}   name="open_visitor_kiosk"
                                            >
                                        <label class="custom-control-label" for="openvisitorkiosk">Open visitor
                                            kiosk</label>
                                    </div>
                                </div>
                                <div class=" card-title mb-2">
                                    <strong class="mb-3">Users</strong>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="openuser"  value="Yes" {{ $user_role->open_user_page=="Yes"? 'checked':'' }} name="open_user_page" 
                                            >
                                        <label class="custom-control-label" for="openuser">Open users
                                            page</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 pl-3">
                                    <div class="custom-control custom-switch ">
                                        <input type="checkbox" class="custom-control-input" id="adduser"  value="Yes" {{ $user_role->add_user=="Yes"? 'checked':'' }} name="add_user" >
                                        <label class="custom-control-label" for="adduser">Add User</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 pl-3">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="edituser"  value="Yes" {{ $user_role->edit_user=="Yes"? 'checked':'' }}  name="edit_user" >
                                        <label class="custom-control-label" for="edituser">Edit User</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 pl-3">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="deleteuser" value="Yes" {{ $user_role->delete_user=="Yes"? 'checked':'' }}  name="delete_user" >
                                        <label class="custom-control-label" for="deleteuser">Delete User</label>
                                    </div>
                                </div>
                                <div class=" card-title mb-2">
                                    <strong class="mb-3">User Roles</strong>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="openuserrole"  value="Yes" {{ $user_role->open_user_role=="Yes"? 'checked':'' }} name="open_user_role" 
                                            >
                                        <label class="custom-control-label" for="openuserrole">Open user roles
                                            page</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 pl-3">
                                    <div class="custom-control custom-switch ">
                                        <input type="checkbox" class="custom-control-input" id="addrole"  value="Yes" {{ $user_role->add_role=="Yes"? 'checked':'' }} name="add_role" >
                                        <label class="custom-control-label" for="addrole">Add Role</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 pl-3">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="editrole"  value="Yes" {{ $user_role->edit_role=="Yes"? 'checked':'' }}  name="edit_role" >
                                        <label class="custom-control-label" for="editrole">Edit Role</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 pl-3">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="setpermission" value="Yes" {{ $user_role->set_permission=="Yes"? 'checked':'' }} name="set_permission" >
                                        <label class="custom-control-label" for="setpermission">Set Permission</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3 pl-3">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="deleterole"  value="Yes" {{ $user_role->delete_role=="Yes"? 'checked':'' }} name="delete_role" >
                                        <label class="custom-control-label" for="deleterole">Delete Role</label>
                                    </div>
                                </div>
                                <div class=" card-title mb-2">
                                    <strong class="mb-3">Settings</strong>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="opensetting"  value="Yes" {{ $user_role->open_setting=="Yes"? 'checked':'' }} name="open_setting" 
                                            >
                                        <label class="custom-control-label" for="opensetting">Open settings
                                            page</label>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-2 pl-3">
                                    <div class="custom-control custom-switch ">
                                        <input type="checkbox" class="custom-control-input" id="updatesetting" value="Yes" {{ $user_role->update_setting=="Yes"? 'checked':'' }} name="update_setting"  >
                                        <label class="custom-control-label" for="updatesetting">Update settings</label>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Set Permission </button>
                            <a href="{{ route('userrole.index') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div> <!-- / .card -->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
@endsection
@section('scripts')
@endsection
