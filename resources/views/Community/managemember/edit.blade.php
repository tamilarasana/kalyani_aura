@extends('layouts.dashboard')
@section('title')
    Kalyani Aura
@endsection
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <form action="{{route('managemember.update', $member->id)}}" method = "post" class="needs-validation" novalidate>
                    {{csrf_field()}}
				    @method('PUT')
                    <div class="row align-items-center mb-2">
                        <div class="col">
                            <h2 class="h5 page-title">Manage Members</h2>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                            <div class="card-header">
                                <strong class="card-title">Edit Member </strong>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom01">First Name</label>
                                        <input type="text" class="form-control" id="validationCustom01" name="first_name" value="{{ $member->first_name }}"  placeholder="First Name" required>
                                        <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom02">Last Name</label>
                                        <input type="text" class="form-control" id="validationCustom02" name="last_name" value="{{ $member->last_name }}"  placeholder="Last Name" required>
                                        <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom03">User Name</label>
                                        <input type="text" class="form-control" id="validationCustom03" name="name" value="{{ $member->name }}" placeholder="Number" required>
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom04">Email</label>
                                        <input type="email" class="form-control" id="validationCustom04" name="email" value="{{ $member->email }}"  placeholder="Email" required>
                                        <span class="text-danger">{{ $errors->first('email') }}</span>

                                    </div>
                                    
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom05">Mobile</label>
                                        <input type="number" class="form-control" id="validationCustom05" name="mobile"  value="{{ $member->mobile }}" placeholder="Mobile" required>
                                        <span class="text-danger">{{ $errors->first('mobile') }}</span>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom06">Work Location</label>
                                        <select class="form-control" id="validationCustom06" name="work_station" required>
                                            <option selected disabled value="">Choose...</option>
                                            @foreach($location as $key => $datas)
                                            <option  {{ $member->work_station === $datas->id? 'selected' : ''}}  value="{{$datas->id}}">{{$datas->location_name}}</option>
                                             @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first('work_station') }}</span>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom07">Working Company</label>
                                        <select class="form-control" id="validationCustom07" name="working_company" required>
                                            <option selected disabled value="">Choose...</option>
                                            @foreach($general as $key => $data)
                                            <option  {{ $member->working_company === $data->id? 'selected' : ''}}  value="{{$data->id}}">{{$data->company_name}}</option>
                                             @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first('working_company') }}</span>

                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom08">Designation</label>
                                        <input type="text" class="form-control" id="validationCustom08" name="designation"  value="{{ $member->designation }}" placeholder="Designation" required>
                                        <span class="text-danger">{{ $errors->first('designation') }}</span>
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
                                <a href="{{ route("managemember.index") }}" class="btn btn-secondary">Back</a>                         
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
