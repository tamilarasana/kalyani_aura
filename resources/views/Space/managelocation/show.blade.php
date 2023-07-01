@extends('layouts.dashboard')
@section('title')
    Kalyani Aura
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">

                {{-- <form action="{{route('managelocations.update', $locationgeneral->id)}}" method = "post" class="needs-validation" novalidate>
                    {{csrf_field()}}
				    @method('PUT') --}}
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
                                        <div class="col-md-12 mb-3">
                                            <label for="validationCustom3">Location Name</label>
                                            <input type="text" class="form-control"
                                                id="validationCustom3"name="location_name"
                                                value="{{ $locationgeneral->location_name }}" placeholder="Name" disabled
                                                required>
                                            <div class="valid-feedback"> Looks good! </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="validationCustom4">Contact Number</label>
                                            <input type="text" class="form-control" id="validationCustom4"
                                                name="contact_number" value="{{ $locationgeneral->contact_number }}"
                                                placeholder="95XXXXXX78" disabled required>
                                            <div class="valid-feedback"> Looks good! </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="validationCustom4">Email</label>
                                            <input type="email" class="form-control" id="validationCustom4" name="email"
                                                value="{{ $locationgeneral->email }}" placeholder="example@gmail.com"
                                                disabled required>
                                            <div class="valid-feedback"> Looks good! </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom4">Seating Capacity</label>
                                            <input type="text" class="form-control" id="validationCustom4"
                                                name="seating_capacity" value="{{ $locationgeneral->seating_capacity }}"
                                                placeholder="001" disabled required>
                                            <div class="valid-feedback"> Looks good! </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom4">Area</label>
                                            <input type="text" class="form-control" id="validationCustom4" name="area"
                                                value="{{ $locationgeneral->area }}" placeholder="Area" disabled required>
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
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom3">Legal Business Name</label>
                                        <input type="text" class="form-control" id="validationCustom3"
                                            name="legal_business_name" value="{{ $locationbilling->legal_business_name }}"
                                            placeholder="Legel Business Name" disabled required>
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom4">Address</label>
                                        <input type="text" class="form-control" id="validationCustom4" name="address"
                                            value="{{ $locationbilling->address }}" placeholder="Address" disabled required>
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom4">Notes Top</label>
                                        <input type="text" class="form-control" id="validationCustom4"
                                            value="{{ $locationbilling->notes_top }}" name="notes_top"
                                            placeholder="Notes Top" disabled required>
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom3">Notes Bottom</label>
                                        <input type="text" class="form-control" id="validationCustom3"
                                            value="{{ $locationbilling->notes_bottom }}" name="notes_bottom"
                                            placeholder="Notes Bottom" disabled required>
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom4">GSTN</label>
                                        <input type="text" class="form-control" id="validationCustom4"
                                            value="{{ $locationbilling->gstn }}" name="gstn" placeholder="GSTN"
                                            disabled required>
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom3">State</label>
                                        <input type="text" class="form-control" id="validationCustom3" name="state"
                                            value="{{ $locationbilling->state }}" placeholder="State" disabled required>
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom4">City</label>
                                        <input type="text" class="form-control" id="validationCustom4" name="city"
                                            value="{{ $locationbilling->city }}" placeholder="City" disabled required>
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
                                <strong class="card-title">Bank Details</strong>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom3">Bank Name</label>
                                        <input type="text" class="form-control" id="validationCustom3"
                                            value="{{ $locationbank->bank_name }}" disabled name="bank_name"
                                            placeholder="Ex: XXXXBANK" required>
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom4">Account Number</label>
                                        <input type="text" class="form-control"
                                            id="validationCustom4"name="account_number"
                                            value="{{ $locationbank->account_number }}" placeholder="XXXXXXXXXXXX1234"
                                            disabled required>
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom4">Branch</label>
                                        <input type="text" class="form-control" id="validationCustom4" name="branch"
                                            value="{{ $locationbank->branch }}" placeholder="Branch" disabled required>
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom3">IFSC</label>
                                        <input type="text" class="form-control" id="validationCustom3"
                                            placeholder="IFSC" name="ifsc" value="{{ $locationbank->ifsc }}" disabled
                                            required>
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom4">Benificiary</label>
                                        <input type="text" class="form-control"
                                            id="validationCustom4"name="benificiary_name"
                                            value="{{ $locationbank->benificiary_name }}" placeholder="Benificiary Name"
                                            disabled required>
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                    {{-- <div class="col-md-6 mb-3">
                                        <label for="validationCustom3">State</label>
                                        <input type="text" class="form-control" id="validationCustom3" name="state"
                                            placeholder="State" value="{{ $locationbank->state }}" disabled required>
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div> --}}
                                    {{-- <div class="col-md-6 mb-3">
                                        <label for="validationCustom4">City</label>
                                        <input type="text" class="form-control" id="validationCustom4" name="city"
                                            placeholder="City" value="{{ $locationbank->city }}" disabled required>
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div> --}}
                                </div> <!-- /.form-row -->
                                {{-- <button type="submit" class="btn btn-primary">Add</button>                          --}}
                                <a href="{{ route('managelocations.index') }}" class="btn btn-secondary">Back</a>
                            </div> <!-- /.card-body -->
                        </div> <!-- /.card -->
                    </div> <!-- /.col -->
                </div> <!-- /. end-section -->

                {{-- </form> --}}

            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
@endsection

@section('scripts')
@endsection
