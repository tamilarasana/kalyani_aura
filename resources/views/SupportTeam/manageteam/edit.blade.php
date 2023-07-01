@extends('layouts.dashboard')
@section('title')
    Kalyani Aura
@endsection
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                
                <form action="{{route('manageteam.update', $team->id)}}" method = "post" class="needs-validation" novalidate>
                    {{csrf_field()}}
				    @method('PUT')
                    <div class="row align-items-center mb-2">
                        <div class="col">
                            <h2 class="h5 page-title">Manage Team</h2>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                            <div class="card-header">
                                <strong class="card-title">Edit Team </strong>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom01">First Name</label>
                                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="validationCustom01" name="first_name"  value="{{ $team->first_name }}" placeholder="First Name" required>
                                        <span class="text-danger">@error('first_name'){{ $message }} @enderror</span>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom02">Last Name</label>
                                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="validationCustom02" name="last_name"  value="{{ $team->last_name }}" placeholder="Last Name" required>
                                        <span class="text-danger">@error('last_name'){{ $message }} @enderror</span>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom03">User Name</label>
                                        <input type="text" class="form-control @error('user_name') is-invalid @enderror" id="validationCustom03" name="user_name" value="{{ $team->user_name }}" placeholder="Number" required>
                                        <div class="invalid-feedback"> Please enter a Hsn Code Minimum  3 Characters</div>
                                        <span class="text-danger">@error('user_name'){{ $message }} @enderror</span>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom04">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="validationCustom04" name="email" value="{{ $team->email }}" placeholder="Email" required>
                                        <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                                    </div>
                                    
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom05">Mobile</label>
                                        <input type="number" class="form-control @error('mobile') is-invalid @enderror" id="validationCustom05" name="mobile"  value="{{ $team->mobile }}" placeholder="Mobile" required>
                                        <span class="text-danger">@error('mobile'){{ $message }} @enderror</span>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom06">Work Location</label>
                                        <select class="form-control @error('work_station') is-invalid @enderror" id="validationCustom06" name="work_station"  required>
                                            <option selected disabled value="">Choose...</option>
                                            @foreach($location as $key => $datas)
                                            <option  {{ $team->work_station === $datas->id? 'selected' : ''}}  value="{{$datas->id}}">{{$datas->location_name}}</option>
                                             @endforeach
                                        </select>
                                        <span class="text-danger">@error('work_station'){{ $message }} @enderror</span>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom07">Scope</label>
                                        <select class="form-control @error('scope_id') is-invalid @enderror" id="validationCustom07" name="scope_id" required>
                                            <option selected disabled value="">Choose...</option>
                                            @foreach($scopes as $key => $data)
                                            <option  {{ $team->scope_id === $data->id? 'selected' : ''}}  value="{{$data->id}}">{{$data->scope_name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">@error('scope_id'){{ $message }} @enderror</span>
                                    </div>
                                    {{-- <div class="col-md-4 mb-3">
                                        <label for="validationCustom08">Role</label>
                                        <select class="form-control @error('role_id') is-invalid @enderror" id="validationCustom08" name="role_id" required>
                                            <option selected disabled value="">Choose...</option>
                                            @foreach($roles as $key => $data)
                                            <option  {{ $team->role === $data->id? 'selected' : ''}}  value="{{$data->id}}">{{$data->role}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">@error('role_id'){{ $message }} @enderror</span>
                                    </div> --}}
                                   
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom09">Designation</label>
                                        <input type="text" class="form-control @error('designation') is-invalid @enderror" id="validationCustom09" name="designation"  value="{{ $team->designation }}"  placeholder="Designation" required>
                                        <span class="text-danger">@error('designation'){{ $message }} @enderror</span>
                                    </div>
                                </div> <!-- /.form-row --> 
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input class="form-check-input " type="checkbox" name="spoc" value="1" id="invalidCheck" >
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
