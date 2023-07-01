@extends('layouts.dashboard')
@section('title')
    Kalyani Aura
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">

                <form action="{{ route('managelocations.update', $locationgeneral->id) }}" method="post"
                    class="needs-validation" novalidate>
                    {{ csrf_field() }}
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
                                            <div class="col-md-12 mb-3">
                                                <label for="validationCustom01">Location Name</label>
                                                <input type="text" class="form-control"
                                                    id="validationCustom01"name="location_name"
                                                    value="{{ $locationgeneral->location_name }}" placeholder="Name"
                                                    required>
                                                    @if ($errors->has('location_name'))
                                                    <span class="text-danger">{{ $errors->first('location_name') }}</span>
                                                    @endif
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="validationCustom02">Contact Number</label>
                                                <input type="number" class="form-control" id="validationCustom02"
                                                    name="contact_number" value="{{ $locationgeneral->contact_number }}"
                                                    placeholder="95XXXXXX78" required>
                                                    @if ($errors->has('contact_number'))
                                                    <span class="text-danger">{{ $errors->first('contact_number') }}</span>
                                                    @endif
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="exampleInputEmail1">Email</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1"
                                                    name="email" value="{{ $locationgeneral->email }}"
                                                    placeholder="example@gmail.com" required>
                                                    @if ($errors->has('email'))
                                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                                    @endif
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom04">Seating Capacity</label>
                                                <input type="number" class="form-control" id="validationCustom04"
                                                    name="seating_capacity" value="{{ $locationgeneral->seating_capacity }}"
                                                    placeholder="001" required>
                                                    @if ($errors->has('seating_capacity'))
                                                    <span class="text-danger">{{ $errors->first('seating_capacity') }}</span>
                                                    @endif
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom05">Area</label>
                                                <input type="text" class="form-control" id="validationCustom05"
                                                    name="area" value="{{ $locationgeneral->area }}" placeholder="Area"
                                                    required>
                                                    @if ($errors->has('area'))
                                                    <span class="text-danger">{{ $errors->first('area') }}</span>
                                                    @endif
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom06">Business Hours  Start</label>
                                                <input type="time" class="form-control" id="validationCustom06"
                                                    name="business_hours_s" value="{{ $locationgeneral->business_hours_s }}"  required>
                                                    @if ($errors->has('business_hours_s'))
                                                    <span class="text-danger">{{ $errors->first('business_hours_s') }}</span>
                                                    @endif
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom07">Business Hours End</label>
                                                <input type="time" class="form-control" id="validationCustom07"
                                                    name="business_hours_e" value="{{ $locationgeneral->business_hours_e }}"  placeholder="Area" required>
                                                    @if ($errors->has('business_hours_e'))
                                                    <span class="text-danger">{{ $errors->first('business_hours_e') }}</span>
                                                    @endif
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
                                            <label for="validationCustom08">Legal Business Name</label>
                                            <input type="text" class="form-control" id="validationCustom08"
                                                name="legal_business_name"
                                                value="{{ $locationbilling->legal_business_name }}"
                                                placeholder="Legel Business Name" required>
                                                @if ($errors->has('legal_business_name'))
                                                <span class="text-danger">{{ $errors->first('legal_business_name') }}</span>
                                                @endif
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="validationCustom08">Address</label>
                                            <input type="text" class="form-control" id="validationCustom08" name="address"
                                                value="{{ $locationbilling->address }}" placeholder="Address" required>
                                                @if ($errors->has('address'))
                                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                                @endif
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom09">Notes Top</label>
                                            <input type="text" class="form-control" id="validationCustom09"
                                                value="{{ $locationbilling->notes_top }}" name="notes_top"
                                                placeholder="Notes Top" required>
                                                @if ($errors->has('notes_top'))
                                                <span class="text-danger">{{ $errors->first('notes_top') }}</span>
                                                @endif
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom10">Notes Bottom</label>
                                            <input type="text" class="form-control" id="validationCustom10"
                                                value="{{ $locationbilling->notes_bottom }}" name="notes_bottom"
                                                placeholder="Notes Bottom" required>
                                                @if ($errors->has('notes_bottom'))
                                                <span class="text-danger">{{ $errors->first('notes_bottom') }}</span>
                                                @endif
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom11">GSTN</label>
                                            <input type="text" class="form-control" id="validationCustom11"
                                                value="{{ $locationbilling->gstn }}" name="gstn" placeholder="GSTN"
                                                required>
                                                @if ($errors->has('gstn'))
                                                <span class="text-danger">{{ $errors->first('gstn') }}</span>
                                                @endif
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom12">State</label>
                                            <input type="text" class="form-control" id="validationCustom12"
                                                name="state" value="{{ $locationbilling->state }}" placeholder="State"
                                                required>
                                                @if ($errors->has('state'))
                                                <span class="text-danger">{{ $errors->first('state') }}</span>
                                                @endif
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom13">City</label>
                                            <input type="text" class="form-control" id="validationCustom13"
                                                name="city" value="{{ $locationbilling->city }}" placeholder="City"
                                                required>
                                                @if ($errors->has('city'))
                                                <span class="text-danger">{{ $errors->first('city') }}</span>
                                                @endif
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
                                            <label for="validationCustom14">Bank Name</label>
                                            <input type="text" class="form-control" id="validationCustom14"
                                                value="{{ $locationbank->bank_name }}" name="bank_name"
                                                placeholder="Ex: XXXXBANK" required>
                                                @if ($errors->has('bank_name'))
                                                <span class="text-danger">{{ $errors->first('bank_name') }}</span>
                                                @endif
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom15">Account Number</label>
                                            <input type="number" class="form-control"
                                                id="validationCustom15"name="account_number"
                                                value="{{ $locationbank->account_number }}"
                                                placeholder="XXXXXXXXXXXX1234" required>
                                                @if ($errors->has('account_number'))
                                                <span class="text-danger">{{ $errors->first('account_number') }}</span>
                                                @endif
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom16">Branch</label>
                                            <input type="text" class="form-control" id="validationCustom16"
                                                name="branch" value="{{ $locationbank->branch }}" placeholder="Branch"
                                                required>
                                                @if ($errors->has('branch'))
                                                <span class="text-danger">{{ $errors->first('branch') }}</span>
                                                @endif
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom18">IFSC</label>
                                            <input type="text" class="form-control" id="validationCustom18"
                                                placeholder="IFSC" name="ifsc" value="{{ $locationbank->ifsc }}"
                                                required>
                                                @if ($errors->has('ifsc'))
                                                <span class="text-danger">{{ $errors->first('ifsc') }}</span>
                                                @endif
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom19">Benificiary</label>
                                            <input type="text" class="form-control"
                                                id="validationCustom19"name="benificiary_name"
                                                value="{{ $locationbank->benificiary_name }}"
                                                placeholder="Benificiary Name"required>
                                                @if ($errors->has('benificiary_name'))
                                                <span class="text-danger">{{ $errors->first('benificiary_name') }}</span>
                                                @endif
                                        </div>
                                        {{-- <div class="col-md-6 mb-3">
                                            <label for="validationCustom20">State</label>
                                            <input type="text" class="form-control" id="validationCustom20"
                                                name="state" placeholder="State" value="{{ $locationbank->state }}"
                                                required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom21">City</label>
                                            <input type="text" class="form-control" id="validationCustom21"
                                                name="city" placeholder="City"
                                                value="{{ $locationbank->city }}"required>
                                        </div> --}}
                                    </div> <!-- /.form-row -->
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="{{ route('managelocations.index') }}" class="btn btn-secondary">Cancel</a>
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
