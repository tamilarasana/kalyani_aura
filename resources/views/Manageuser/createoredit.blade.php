@extends('layouts.dashboard')
@section('title')
    Kalyani Aura
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                @if (isset($manageuser))
                    <form action="{{ route('manageuser.update', $manageuser->id) }}" method="post" class="needs-validation"
                        enctype="multipart/form-data" novalidate>
                        {{ csrf_field() }}
                        @method('PUT')
                    @else
                        <form action="{{ route('manageuser.store') }}" method="post" class="needs-validation"
                            enctype="multipart/form-data" novalidate>
                            {{ csrf_field() }}
                @endif

                {{-- <div class="row align-items-center mb-2">
                    <div class="col">
                        
                        <h2 class="h5 page-title">Manage Invntory</h2>
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow mb-4">
                            <div class="card-header">
                                <strong class="card-title">{{ isset($manageuser->id) ? 'Edit User' : 'Add New User' }}
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="username">User Name</label>
                                        <input type="text" class="form-control" id="username" name="user_name"
                                        value="{{ old('user_name', isset($manageuser->user_name) ? $manageuser->user_name : null) }}"
                                            placeholder="Name" minlength="3" required>
                                            <span class="text-danger">@error('user_name'){{ $message }} @enderror</span>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="useremail">Email</label>
                                        <input type="email" class="form-control" id="useremail" name="user_email"
                                            value="{{ old('user_name', isset($manageuser->user_email) ? $manageuser->user_email : null) }}"
                                            placeholder="Email" minlength="3" required>
                                            <span class="text-danger">@error('user_email'){{ $message }} @enderror</span>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="userdata">Role </label>
                                        <select class="form-control" id="userdata" name="role_id" required>
                                            <option selected disabled value="">Choose...</option>
                                            @if (isset($manageuser))
                                           
                                                @foreach ($userdata as $key => $datas)
                                                    <option {{ $manageuser->role_id === $datas->id ? 'selected' : '' }}
                                                        value="{{ $datas->id }}">{{ $datas->role_name }}
                                                    </option>
                                                @endforeach
                                            @else
                                                @foreach ($userdata as $key => $datas)
                                                    <option value="{{ $datas->id }}"  {{(old('role_id')==$datas->id)? 'selected':''}}>{{ $datas->role_name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <span class="text-danger">@error('role_id'){{ $message }} @enderror</span>

                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="userstatus">Status</label>
                                        <select class="form-control" id="userstatus" name="status" required >
                                            <option selected disabled value="">Choose...</option>
                                            @if (isset($manageuser))
                                                <option value="enabled" {{ $manageuser->status == 'enabled' ? 'selected' : '' }}>
                                                    Enabled</option>
                                                <option value="disabled"  {{ $manageuser->status == 'disabled' ? 'selected' : '' }}>
                                                    Disabled</option>
                                            @else
                                                <option value="enabled"  @if (old('status') == 'enabled') selected="selected" @endif >Enabled</option>
                                                <option value="disabled"  @if (old('status') == 'disabled') selected="selected" @endif>Disabled</option>
                                            @endif

                                        </select>
                                        <span class="text-danger">@error('status'){{ $message }} @enderror</span>

                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                        {{-- value="{{ old('password', isset($manageuser->password) ? $manageuser->password : null) }}" --}}
                                            placeholder="Enter Your Password" required>
                                            @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif  
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="password">Confirm New Password</label>
                                        <input type="password" class="form-control" id="validationCustom10" name="password_confirmation"  placeholder="Confirm Password" required>
                                        @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                    @endif
                                        {{-- <input type="password" class="form-control" id="password" name="password"  placeholder="Enter Your Confirm Password" > --}}
                                    </div>
                                    
                                </div> <!-- /.form-row -->
                                <div class="mb-2">

                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="{{ route('manageuser.index') }}" class="btn btn-secondary">Cancel</a>

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
