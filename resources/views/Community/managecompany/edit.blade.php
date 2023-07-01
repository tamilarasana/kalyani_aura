@extends('layouts.dashboard')
@section('title')
    Kalyani Aura
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <form action="{{route('managecompany.update', $general->id)}}" method = "post"class="needs-validation"  enctype="multipart/form-data" novalidate>
                    {{csrf_field()}}
				    @method('PUT')
                    <div class="row align-items-center mb-2">
                        <div class="col">
                            <h2 class="h5 page-title">Manage Location</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <strong class="card-title">General</strong>
                                </div>
                                <div class="card-body">
                                    <form class="needs-validation" novalidate>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-4">
                                                <label for="validationCustom01">Company Name</label>
                                                <input type="text" class="form-control @error('company_name') is-invalid @enderror"
                                                    id="validationCustom01"name="company_name" placeholder="Company Name" value="{{ $general->company_name }}" required>
                                                <span class="text-danger">@error('company_name'){{ $message }} @enderror</span>
                                               </div>
                                            <div class="col-md-6 mb-4">
                                                <label for="validationCustom02">Company e-mail</label>
                                                <input type="email" class="form-control @error('company_email') is-invalid @enderror" id="validationCustom02"
                                                    name="company_email" placeholder="example@gmail.com" value="{{ $general->company_email }}" required>
                                                    <span class="text-danger">@error('company_email'){{ $message }} @enderror</span>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <label for="validationCustom03">Contact Number</label>
                                                <input type="text" class="form-control @error('contact_number') is-invalid @enderror" id="validationCustom03"
                                                    name="contact_number" placeholder="95XXXXXX78" value="{{ $general->contact_number }}"   required>
                                                    <span class="text-danger">@error('contact_number'){{ $message }} @enderror</span>

                                                </div>
                                            <div class="col-md-6 mb-4">
                                                <label for="validationCustom04">Web URL</label>
                                                <input type="text" class="form-control @error('web_url') is-invalid @enderror" id="validationCustom04"
                                                    name="web_url" placeholder="www.domain.com"  value="{{ $general->web_url }}"  required>
                                                    <span class="text-danger">@error('web_url'){{ $message }} @enderror</span>
                                                </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom05">Location</label>
                                                <select  class="form-control @error('location') is-invalid @enderror"   id="validationCustom05" name="location" required>
                                                    <option selected disabled value="">Choose...</option>
                                                    @foreach($location as $key => $data)
                                                      <option  {{ $general->location === $data->id? 'selected' : ''}}  value="{{$data->id}}">{{$data->location_name}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">@error('location'){{ $message }} @enderror</span>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom06">Reference</label>
                                                <input type="text" class="form-control @error('reference') is-invalid @enderror" id="validationCustom06"
                                                    name="reference" placeholder="Reference" value="{{ $general->reference }}" required>
                                                    <span class="text-danger">@error('reference'){{ $message }} @enderror</span>
                                            </div>
                                        </div> <!-- /.form-row -->
                                </div> <!-- /.card-body -->
                            </div> <!-- /.card -->
                        </div> <!-- /.col -->

                        <div class="col-md-6">
                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <strong class="card-title">Billing Details </strong>
                                </div>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-md-6 mb-2">
                                            <label for="validationCustom07">CIN</label>
                                            <input type="text" class="form-control @error('cin') is-invalid @enderror" id="validationCustom07"
                                                name="cin" placeholder="CIN" value="{{ $companybilling->cin }}" required>
                                                <span class="text-danger">@error('cin'){{ $message }} @enderror</span>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="validationCustom08">PAN</label>
                                            <input type="text" class="form-control  @error('pan') is-invalid @enderror" id="validationCustom08"
                                                name="pan" placeholder="PAN" value="{{ $companybilling->pan }}" required>
                                                <span class="text-danger">@error('pan'){{ $message }} @enderror</span>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="validationCustom09">GSTN</label>
                                            <input type="text" class="form-control  @error('gstn') is-invalid @enderror" id="validationCustom09"
                                                name="gstn" placeholder="GSTN" value="{{ $companybilling->gstn }}" required>
                                                <span class="text-danger">@error('gstn'){{ $message }} @enderror</span>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="validationCustom10">TAN</label>
                                            <input type="text" class="form-control  @error('tan') is-invalid @enderror" id="validationCustom10"
                                                name="tan" placeholder="TAN"  value="{{ $companybilling->tan }}" required>
                                                <span class="text-danger">@error('tan'){{ $message }} @enderror</span>
                                        </div>
                                        {{-- <div class="col-md-12 mb-2">
                                            <label for="validationTextarea11">Billing Address</label>
                                            <textarea class="form-control @error('billing_address') is-invalid @enderror" id="validationTextarea11" placeholder="Description"  name="billing_address"  rows="3"  required="">{{ $companybilling->billing_address }}</textarea>
                                            <span class="text-danger">@error('billing_address'){{ $message }} @enderror</span>
                                        </div> --}}

                                        <div class="form-group col-md-12 mb-2">
                                            <label for="validationTextarea1">Billing Address</label>
                                            <textarea class="form-control  @error('billing_address') is-invalid @enderror" id="validationTextarea1" placeholder="Take a address here"  name="billing_address"   required="" rows="3">{{ $companybilling->billing_address }}</textarea>
                                            <span class="text-danger">@error('billing_address'){{ $message }} @enderror</span> 
                                        </div>
                                     
                                    </div> <!-- /.form-row -->
                                </div> <!-- /.card-body -->
                            </div> <!-- /.card -->
                        </div> <!-- /.col -->
                    </div> <!-- end section -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <strong class="card-title">SPOC</strong>
                                </div>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom12">First Name</label>
                                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="validationCustom12"
                                                name="first_name" placeholder="First Name"  value="{{ $spoc->first_name }}"  required>
                                                <span class="text-danger">@error('first_name'){{ $message }} @enderror</span>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom13">Last Name</label>
                                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="validationCustom13"
                                                name="last_name" placeholder="Last Name"  value="{{ $spoc->last_name }}" required>
                                                <span class="text-danger">@error('last_name'){{ $message }} @enderror</span>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom14">User Name</label>
                                            <input type="text" class="form-control @error('user_name') is-invalid @enderror" id="validationCustom14"
                                                name="user_name" placeholder="User Name" value="{{ $spoc->user_name }}"  required>
                                                <span class="text-danger">@error('user_name'){{ $message }} @enderror</span>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom15">E-mail</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ $spoc->email }}"  id="validationCustom15"
                                                name="email" placeholder="E-Mail" required>
                                                <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                                        </div>

                                    </div> <!-- /.form-row -->
                                </div> <!-- /.card-body -->
                            </div> <!-- /.card -->
                        </div> <!-- /.col -->
                    </div> <!-- /. end-section -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <strong class="card-title">KYC</strong>
                                </div>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom16">Name</label>
                                            <input type="text" class="form-control @error('kyc_document_name') is-invalid @enderror" id="validationCustom16"
                                                name="kyc_document_name" placeholder="Name Of The Document"   value="{{ $kyc->kyc_document_name }}" required>
                                                <span class="text-danger">@error('kyc_document_name'){{ $message }} @enderror</span>

                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom17">File </label>
                                            <input type="file" class="form-control @error('file') is-invalid @enderror" id="validationCustom17"
                                                name="file" >
                                                <img src="{{ str_replace('public/', '', asset('storage/' . $kyc->file)) }}"
                                                alt="..." width="100" height="80">
                                                <span class="text-danger">@error('file'){{ $message }} @enderror</span>

                                        </div>
                                    </div> <!-- /.form-row -->
                                    <div class="mb-2">

                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <a href="{{ route("managecompany.index") }}" class="btn btn-secondary">Back</a>                         
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
