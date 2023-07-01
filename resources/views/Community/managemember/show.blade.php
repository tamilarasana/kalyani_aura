@extends('layouts.dashboard')
@section('title')
    Kalyani Aura
@endsection
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
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
                                        <label for="validationCustom3">First Name</label>
                                        <input type="text" class="form-control" id="validationCustom3" name="first_name" value="{{ $member->first_name }}" disabled placeholder="First Name" required>
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom3">Last Name</label>
                                        <input type="text" class="form-control" id="validationCustom3" name="last_name" value="{{ $member->last_name }}" disabled placeholder="Last Name" required>
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom3">User Name</label>
                                        <input type="text" class="form-control" id="validationCustom3" name="name" value="{{ $member->name }}" placeholder="Number" disabled required>
                                        <div class="invalid-feedback"> Please enter a Hsn Code Minimum  3 Characters</div>
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom3">Email</label>
                                        <input type="email" class="form-control" id="validationCustom3" name="email" value="{{ $member->email }}"  placeholder="Email" disabled required>
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                    
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom3">Mobile</label>
                                        <input type="number" class="form-control" id="validationCustom3" name="mobile"  value="{{ $member->mobile }}" placeholder="Mobile" disabled required>
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom04">Work Location</label>
                                        <select class="form-control" id="validationCustom04" name="work_station" disabled required>
                                            <option selected disabled value="">Choose...</option>
                                            @foreach($location as $key => $datas)
                                            <option  {{ $member->work_station === $datas->id? 'selected' : ''}}  value="{{$datas->id}}">{{$datas->location_name}}</option>
                                             @endforeach
                                        </select>
                                        <div class="invalid-feedback"> Please select a valid state. </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom04">Working Company</label>
                                        <select class="form-control" id="validationCustom04" name="working_company" disabled required>
                                            <option selected disabled value="">Choose...</option>
                                            @foreach($general as $key => $data)
                                            <option  {{ $member->working_company === $data->id? 'selected' : ''}}  value="{{$data->id}}">{{$data->company_name}}</option>
                                             @endforeach
                                        </select>
                                        <div class="invalid-feedback"> Please select a valid state. </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom3">Designation</label>
                                        <input type="text" class="form-control" id="validationCustom3" name="designation"  value="{{ $member->designation }}" disabled placeholder="Designation" required>
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                            
                                </div> <!-- /.form-row --> 
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input class="form-check-input" type="checkbox" name="spoc" value="1" id="invalidCheck" disabled >
                                          <label class="form-check-label" for="invalidCheck"> SPOC (Special point of contact) A company member who can receive/pay invoices
                                        </label>
                                        </div>
                                    </div>
                                <div class="mb-2">
 
                                    <a href="{{ route("managemember.index") }}" class="btn btn-secondary">Back</a>                         
                                </div>
                     
                            </div> <!-- /.card-body -->
                            </div> <!-- /.card -->
                        </div> <!-- /.col -->             
                    </div> <!-- /. end-section -->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->

@endsection

@section('scripts')
@endsection
