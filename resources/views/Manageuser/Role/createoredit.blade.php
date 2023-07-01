@extends('layouts.dashboard')
@section('title')
    Kalyani Aura
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">

                @if (isset($user_role))
                    <form action="{{ route('userdata.update', $user_role->id) }}" method="post" class="needs-validation"
                        enctype="multipart/form-data" novalidate>
                        {{ csrf_field() }}
                        @method('PUT')
                    @else
                        <form action="{{ route('userdata.store') }}" method="post" class="needs-validation"
                            enctype="multipart/form-data" novalidate>
                            {{ csrf_field() }}
                @endif

                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow mb-4">
                            <div class="card-header">
                                <strong class="card-title">{{ isset($user_role->id) ? 'Edit Role' : 'Add New Role' }}
                                </strong>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="rolename">Role Name</label>
                                        <input type="text" class="form-control" id="rolename"
                                            value="{{ old('role_name', isset($user_role->role_name) ? $user_role->role_name : null) }}"
                                            name="role_name" placeholder="Name" minlength="3" required>
                                    </div>


                                    <div class="col-md-12 mb-3">
                                        <label for="userstatus">Status</label>
                                        <select class="form-control" id="userstatus" name="status" required>
                                            <option selected disabled value="">Choose...</option>
                                            @if (isset($user_role))
                                                <option value="enabled" @if ($user_role->status == 'enabled') selected @endif>
                                                    Enabled</option>
                                                <option value="disabled" @if ($user_role->status == 'disabled') selected @endif>
                                                    Disabled</option>
                                            @else
                                                <option value="enabled">Enabled</option>
                                                <option value="disabled">Disabled</option>
                                            @endif

                                        </select>
                                    </div>


                                </div> <!-- /.form-row -->
                                <div class="mb-2">
                                    <button type="submit" class="btn btn-primary">Save</button>   
                                    <a href="{{ route('userdata.index') }}" class="btn btn-secondary">Cancel</a>
                                    {{-- <button type="submit" class="btn btn-primary">Add</button> --}}
                                </div>

                            </div> <!-- /.card-body -->
                        </div> <!-- /.card -->
                    </div> <!-- /.col -->
                </div> <!-- /. end-section -->
                </form>
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
@endsection

@section('scripts')
@endsection
