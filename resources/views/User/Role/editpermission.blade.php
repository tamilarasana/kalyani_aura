@extends('layouts.dashboard')
@section('title')
    Kalyani Aura
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title">Form elements</h2>

                <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong class="card-title">Form controls</strong>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" novalidate>
                            <div class="form-row mb-2 ">
                                <div class=" card-title mb-2">
                                    <strong class="mb-3">Dashboard</strong>
                                </div>
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="customControlValidation1"
                                            required>
                                        <label class="custom-control-label" for="customControlValidation1">Open
                                            dashboard page</label>
                                        <div class="invalid-feedback">Example invalid feedback text</div>
                                    </div>
                                </div>
                                <div class=" card-title mb-2">
                                    <strong class="mb-3">Visitor Logs</strong>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="customControlValidation1"
                                            required>
                                        <label class="custom-control-label" for="customControlValidation1">Open visitor
                                            logs page</label>
                                        <div class="invalid-feedback">Example invalid feedback text</div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 pl-3">
                                    <div class="custom-control custom-switch ">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                        <label class="custom-control-label" for="customSwitch1">Add Visitor</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 pl-3">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                        <label class="custom-control-label" for="customSwitch1">View Visitor</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 pl-3">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                        <label class="custom-control-label" for="customSwitch1">Edit Visitor</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3 pl-3">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                        <label class="custom-control-label" for="customSwitch1">Delete Visitor</label>
                                    </div>
                                </div>
                                <div class=" card-title mb-2">
                                    <strong class="mb-3">Visitor Timeline</strong>
                                </div>
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="customControlValidation1"
                                            required>
                                        <label class="custom-control-label" for="customControlValidation1">Open visitor
                                            timeline page</label>
                                        <div class="invalid-feedback">Example invalid feedback text</div>
                                    </div>
                                </div>
                                <div class=" card-title mb-2">
                                    <strong class="mb-3">Reason for Visits</strong>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="customControlValidation1"
                                            required>
                                        <label class="custom-control-label" for="customControlValidation1">Open reason for
                                            visits page</label>
                                        <div class="invalid-feedback">Example invalid feedback text</div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2  pl-3">
                                    <div class="custom-control custom-switch ">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                        <label class="custom-control-label" for="customSwitch1">Add Reason</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 pl-3">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                        <label class="custom-control-label" for="customSwitch1">Delete Reason</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 pl-3">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                        <label class="custom-control-label" for="customSwitch1">Import Reason</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3 pl-3">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                        <label class="custom-control-label" for="customSwitch1">Export Reason</label>
                                    </div>
                                </div>
                                <div class=" card-title mb-2">
                                    <strong class="mb-3">Visitor Kiosk</strong>
                                </div>
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="customControlValidation1"
                                            required>
                                        <label class="custom-control-label" for="customControlValidation1">Open visitor
                                            kiosk</label>
                                        <div class="invalid-feedback">Example invalid feedback text</div>
                                    </div>
                                </div>
                                <div class=" card-title mb-2">
                                    <strong class="mb-3">Users</strong>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="customControlValidation1"
                                            required>
                                        <label class="custom-control-label" for="customControlValidation1">Open users
                                            page</label>
                                        <div class="invalid-feedback">Example invalid feedback text</div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 pl-3">
                                    <div class="custom-control custom-switch ">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                        <label class="custom-control-label" for="customSwitch1">Add User</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 pl-3">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                        <label class="custom-control-label" for="customSwitch1">Edit User</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 pl-3">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                        <label class="custom-control-label" for="customSwitch1">Delete User</label>
                                    </div>
                                </div>
                                <div class=" card-title mb-2">
                                    <strong class="mb-3">User Roles</strong>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="customControlValidation1"
                                            required>
                                        <label class="custom-control-label" for="customControlValidation1">Open user roles
                                            page</label>
                                        <div class="invalid-feedback">Example invalid feedback text</div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 pl-3">
                                    <div class="custom-control custom-switch ">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                        <label class="custom-control-label" for="customSwitch1">Add Role</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 pl-3">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                        <label class="custom-control-label" for="customSwitch1">Edit Role</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 pl-3">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                        <label class="custom-control-label" for="customSwitch1">Set Permission</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3 pl-3">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                        <label class="custom-control-label" for="customSwitch1">Delete Role</label>
                                    </div>
                                </div>
                                <div class=" card-title mb-2">
                                    <strong class="mb-3">Settings</strong>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="customControlValidation1"
                                            required>
                                        <label class="custom-control-label" for="customControlValidation1">Open settings
                                            page</label>
                                        <div class="invalid-feedback">Example invalid feedback text</div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-2 pl-3">
                                    <div class="custom-control custom-switch ">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                        <label class="custom-control-label" for="customSwitch1">Add Role</label>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </form>
                    </div>
                </div> <!-- / .card -->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
@endsection
@section('scripts')
@endsection
