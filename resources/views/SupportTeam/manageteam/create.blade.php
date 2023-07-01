@extends('layouts.dashboard')
@section('title')
    Kalyani Aura
@endsection
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                
                <form action="{{route('manageteam.store')}}" method = "post" class="needs-validation" novalidate>
                    {{csrf_field()}}
                    <div class="row align-items-center mb-2">
                        <div class="col">
                            <h2 class="h5 page-title">Manage Members</h2>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <strong class="card-title">Add Member </strong>
                                </div>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom01">First Name</label>
                                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="validationCustom01" name="first_name" value="{{ old('first_name') }}" placeholder="First Name" required>
                                            <span class="text-danger">@error('first_name'){{ $message }} @enderror</span>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom02">Last Name</label>
                                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="validationCustom02" name="last_name"  value="{{ old('last_name') }}"   placeholder="Last Name" required>
                                            <span class="text-danger">@error('last_name'){{ $message }} @enderror</span>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom03">User Name</label>
                                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="validationCustom03" name="user_name"  value="{{ old('user_name') }}"    placeholder="User Name" required>
                                            <span class="text-danger">@error('user_name'){{ $message }} @enderror</span>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom04">Email</label>
                                            <input type="email" class="form-control   @error('email')  is-invalid @enderror" id="validationCustom04" name="email"  placeholder="Email"   value="{{ old('email') }}" required>
                                            <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                                        </div>
                                        
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom05">Mobile</label>
                                            <input type="tel" class="form-control @error('mobile') is-invalid @enderror" id="validationCustom05" name="mobile" value="{{ old('mobile') }}"  placeholder="Mobile" required>
                                            <span class="text-danger">{{ $errors->first('mobile') }}</span>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom06">Work Location</label>
                                            <select class="form-control @error('work_station') is-invalid @enderror" id="validationCustom06" name="work_station" required >
                                                <option selected disabled value="">Choose...</option>
                                                @foreach($location as $key => $data)
                                                <option value="{{$data->id}}" {{(old('work_station')==$data->id)? 'selected':''}}>{{$data->location_name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{ $errors->first('work_station') }}</span>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom07">Scope</label>
                                            <select class="form-control @error('scope_id') is-invalid @enderror" id="validationCustom07" name="scope_id" required>
                                                <option selected disabled value="">Choose...</option>
                                                @foreach($scopes as $key => $data)
                                                <option value="{{$data->id}}" {{(old('scope_id')==$data->id)? 'selected':''}}>{{$data->scope_name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{ $errors->first('scope_id') }}</span>
                                        </div>
                                        {{-- <div class="col-md-4 mb-3">
                                            <label for="validationCustom08">Role</label>
                                            <select class="form-control @error('last_name') is-invalid @enderror" id="validationCustom08" name="role_id" required>
                                                <option selected disabled value="">Choose...</option>
                                                @foreach($roles as $key => $data)
                                                <option value="{{$data->id}}">{{$data->role}}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">@error('role_id'){{ $message }} @enderror</span>
                                        </div> --}}
                                    
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom09">Designation</label>
                                            <input type="text" class="form-control @error('designation') is-invalid @enderror" id="validationCustom09" value="{{ old('designation') }}"  name="designation"  placeholder="Designation" required>
                                            <span class="text-danger">@error('designation'){{ $message }} @enderror</span>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom10">Password</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="validationCustom10" name="password"  placeholder="Password" autocomplete="current-password" required>
                                            @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif                                    
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom11">Confirm Password</label>
                                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror " id="validationCustom11" name="password_confirmation"  placeholder="Confirm Password" autocomplete="current-password" required>
                                            @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                        @endif
                                        </div>

                                    </div> <!-- /.form-row --> 
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input class="form-check-input" type="checkbox" name="spoc" value="1" id="invalidCheck" >
                                            <label class="form-check-label" for="invalidCheck"> SPOC (Special point of contact) A company member who can receive/pay invoices
                                            </label>
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <button type="submit" class="btn btn-primary">Save</button>    
                                            <a href="{{ route("manageteam.index") }}" class="btn btn-secondary">Back</a>                         
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
