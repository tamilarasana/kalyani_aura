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
                                                <label for="validationCustom3">Company Name</label>
                                                <input type="text" class="form-control"
                                                    id="validationCustom3"name="company_name" placeholder="Company Name" value="{{ $general->company_name }}" disabled required>
                                                <div class="valid-feedback"> Looks good! </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <label for="validationCustom4">Company e-mail</label>
                                                <input type="email" class="form-control" id="validationCustom4"
                                                    name="company_email" placeholder="example@gmail.com" value="{{ $general->company_email }}" disabled required>
                                                <div class="valid-feedback"> Looks good! </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <label for="validationCustom4">Contact Number</label>
                                                <input type="text" class="form-control" id="validationCustom4"
                                                    name="contact_number" placeholder="95XXXXXX78" value="{{ $general->contact_number }}"  disabled  required>
                                                <div class="valid-feedback"> Looks good! </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <label for="validationCustom4">Web URL</label>
                                                <input type="text" class="form-control" id="validationCustom4"
                                                    name="web_url" placeholder="www.domain.com"  value="{{ $general->web_url }}" disabled  required>
                                                <div class="valid-feedback"> Looks good! </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom04">Location</label>
                                                <select  class="form-control"   id="validationCustom04" name="location" disabled required>
                                                    <option selected disabled value="">Choose...</option>
                                                    @foreach($location as $key => $data)
                                                      <option  {{ $general->location === $data->id? 'selected' : ''}}  value="{{$data->id}}">{{$data->location_name}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback"> Please select a valid state. </div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom4">Reference</label>
                                                <input type="text" class="form-control" id="validationCustom4"
                                                    name="reference" placeholder="Reference" value="{{ $general->reference }}" disabled required>
                                                <div class="valid-feedback"> Looks good! </div>
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
                                            <label for="validationCustom4">CIN</label>
                                            <input type="text" class="form-control" id="validationCustom4"
                                                name="cin" placeholder="CIN" value="{{ $companybilling->cin }}" disabled  required>
                                            <div class="valid-feedback"> Looks good! </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="validationCustom4">PAN</label>
                                            <input type="text" class="form-control" id="validationCustom4"
                                                name="pan" placeholder="PAN" value="{{ $companybilling->pan }}" disabled required>
                                            <div class="valid-feedback"> Looks good! </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="validationCustom4">GSTN</label>
                                            <input type="text" class="form-control" id="validationCustom4"
                                                name="gstn" placeholder="GSTN" value="{{ $companybilling->gstn }}" disabled required>
                                            <div class="valid-feedback"> Looks good! </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="validationCustom4">TAN</label>
                                            <input type="text" class="form-control" id="validationCustom4"
                                                name="tan" placeholder="TAN"  value="{{ $companybilling->tan }}" disabled required>
                                            <div class="valid-feedback"> Looks good! </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="validationTextarea1">Billing Address</label>
                                            <textarea class="form-control" id="validationTextarea1" placeholder="Description" disabled name="billing_address"  rows="3"  required>{{ $companybilling->billing_address }}</textarea>
                                            <div class="invalid-feedback"> Please enter a message in the textarea. </div>
                                            <div class="valid-feedback"> Looks good! </div>
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
                                            <label for="validationCustom4">First Name</label>
                                            <input type="text" class="form-control" id="validationCustom4"
                                                name="first_name" placeholder="First Name"  value="{{ $spoc->first_name }}" disabled required>
                                            <div class="valid-feedback"> Looks good! </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom4">Last Name</label>
                                            <input type="text" class="form-control" id="validationCustom4"
                                                name="last_name" placeholder="Last Name"  value="{{ $spoc->last_name }}" disabled required>
                                            <div class="valid-feedback"> Looks good! </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom4">User Name</label>
                                            <input type="text" class="form-control" id="validationCustom4"
                                                name="user_name" placeholder="User Name" value="{{ $spoc->user_name }}" disabled required>
                                            <div class="valid-feedback"> Looks good! </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom4">E-mail</label>
                                            <input type="email" class="form-control" value="{{ $spoc->email }}" disabled id="validationCustom4"
                                                name="email" placeholder="E-Mail" required>
                                            <div class="valid-feedback"> Looks good! </div>
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
                                            <label for="validationCustom4">Name</label>
                                            <input type="text" class="form-control" id="validationCustom4"
                                                name="kyc_document_name" placeholder="Name Of The Document"  value="{{$kyc->kyc_document_name }}"disabled  required>
                                            <div class="valid-feedback"> Looks good! </div>
                                        </div>
                                        {{-- <div class="col-md-6 mb-3">
                                            <label for="validationCustom4">File </label>
                                            <input type="file" class="form-control" id="validationCustom4"
                                                name="image" disabled required>
                                            <div class="valid-feedback"> Looks good! </div>
                                        </div> --}}
                                    </div> <!-- /.form-row -->
                                    <div class="mb-2">

                                        <a href="{{ route("managecompany.index") }}" class="btn btn-secondary">Back</a>                         
                                        {{-- <a href="{{ route('managelocations.index') }}" class="btn mb-2 btn-danger">Danger</a> --}}
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
