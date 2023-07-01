@extends('layouts.dashboard')
@section('title')
    Kalyani Aura
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">

                <form action="{{ route('managelocations.store') }}" method="post" class="needs-validation" novalidate>
                    {{ csrf_field() }}
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
                                                <input type="text" class="form-control @error('location_name') is-invalid @enderror"
                                                    id="validationCustom01"name="location_name" placeholder="Location Name" value="{{ old('location_name') }}" required>
                                                    @if ($errors->has('location_name'))
                                                    <span class="text-danger">{{ $errors->first('location_name') }}</span>
                                                    @endif
                                                </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="validationCustom02">Contact Number</label>
                                                <input type="tel" class="form-control @error('contact_number') is-invalid @enderror" id="validationCustom02" 
                                                    name="contact_number" placeholder="95XXXXXX78"  value="{{ old('contact_number') }}" required >
                                                    @if ($errors->has('contact_number'))
                                                    <span class="text-danger">{{ $errors->first('contact_number') }}</span>
                                                    @endif
                                                </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="exampleInputEmail1">Email</label>
                                                <input type="email" class="form-control  @error('email') is-invalid @enderror" id="exampleInputEmail1"
                                                    name="email" placeholder="example@gmail.com"   value="{{ old('email') }}"  required>
                                                    @if ($errors->has('email'))
                                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                                    @endif
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom04">Seating Capacity</label>
                                                <input type="number" class="form-control @error('seating_capacity') is-invalid @enderror" id="validationCustom04"
                                                    name="seating_capacity" placeholder="001" value="{{ old('seating_capacity') }}" required >
                                                    @if ($errors->has('seating_capacity'))
                                                    <span class="text-danger">{{ $errors->first('seating_capacity') }}</span>
                                                    @endif
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom05">Area</label>
                                                <input type="text" class="form-control  @error('area') is-invalid @enderror" id="validationCustom05"
                                                    name="area" placeholder="Area" value="{{ old('area') }}" required>
                                                    @if ($errors->has('area'))
                                                    <span class="text-danger">{{ $errors->first('area') }}</span>
                                                    @endif
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom06">Business Hours  Start</label>
                                                <input type="time" class="form-control @error('business_hours_s') is-invalid @enderror" id="validationCustom06"
                                                    name="business_hours_s"  min="00:00" max="23:00" value="{{ old('business_hours_s') }}" required >
                                                    @if ($errors->has('business_hours_s'))
                                                    <span class="text-danger">{{ $errors->first('business_hours_s') }}</span>
                                                    @endif
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom07">Business Hours End</label>
                                                <input type="time" class="form-control @error('business_hours_e') is-invalid @enderror" id="validationCustom07"
                                                    name="business_hours_e" min="00:00" max="23:00" placeholder="Area"  value="{{ old('business_hours_e') }}"  required>
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
                                            <input type="text" class="form-control @error('legal_business_name') is-invalid @enderror" id="validationCustom08"
                                                name="legal_business_name" placeholder="Legel Business Name" value="{{ old('legal_business_name') }}" required>
                                                @if ($errors->has('legal_business_name'))
                                                <span class="text-danger">{{ $errors->first('legal_business_name') }}</span>
                                                @endif
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="validationCustom09">Address</label>
                                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="validationCustom09" name="address"
                                                placeholder="Address"  value="{{ old('address') }}" required>
                                                @if ($errors->has('address'))
                                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                                @endif
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom10">Notes Top</label>
                                            <input type="text" class="form-control @error('notes_top') is-invalid @enderror" id="validationCustom10"
                                                name="notes_top" placeholder="Notes Top" value="{{ old('notes_top') }}" required>
                                                @if ($errors->has('notes_top'))
                                                <span class="text-danger">{{ $errors->first('notes_top') }}</span>
                                                @endif
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom11">Notes Bottom</label>
                                            <input type="text" class="form-control @error('notes_bottom') is-invalid @enderror" id="validationCustom11"
                                                name="notes_bottom" placeholder="Notes Bottom" value="{{ old('notes_bottom') }}" required>
                                                @if ($errors->has('notes_bottom'))
                                                <span class="text-danger">{{ $errors->first('notes_bottom') }}</span>
                                                @endif
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom12">GSTN</label>
                                            <input type="text" class="form-control @error('gstn') is-invalid @enderror" id="validationCustom12" name="gstn"
                                                placeholder="GSTN" value="{{ old('gstn') }}" required>
                                                @if ($errors->has('gstn'))
                                                <span class="text-danger">{{ $errors->first('gstn') }}</span>
                                                @endif
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom13">State</label>
                                            <input type="text" class="form-control @error('state') is-invalid @enderror" id="validationCustom13"
                                                name="state" placeholder="State" value="{{ old('state') }}"  required >
                                                @if ($errors->has('state'))
                                                <span class="text-danger">{{ $errors->first('state') }}</span>
                                                @endif
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom14">City</label>
                                            <input type="text" class="form-control @error('city') is-invalid @enderror" id="validationCustom14"
                                                name="city" placeholder="City" value="{{ old('city') }}" required>
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
                                            <label for="validationCustom15">Bank Name</label>
                                            <input type="text" class="form-control @error('bank_name') is-invalid @enderror" id="validationCustom15"
                                                name="bank_name" placeholder="Ex: XXXXBANK"  value="{{ old('bank_name') }}" required>
                                                @if ($errors->has('bank_name'))
                                                <span class="text-danger">{{ $errors->first('bank_name') }}</span>
                                                @endif
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom16">Account Number</label>
                                            <input type="number" class="form-control @error('account_number') is-invalid @enderror"
                                                id="validationCustom16"name="account_number"
                                                placeholder="XXXXXXXXXXXX1234"   value="{{ old('account_number') }}"  required>
                                                @if ($errors->has('account_number'))
                                                <span class="text-danger">{{ $errors->first('account_number') }}</span>
                                                @endif
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom17">Branch</label>
                                            <input type="text" class="form-control @error('branch') is-invalid @enderror" id="validationCustom17"
                                                name="branch" placeholder="Branch" value="{{ old('branch') }}" required>
                                                @if ($errors->has('branch'))
                                                <span class="text-danger">{{ $errors->first('branch') }}</span>
                                                @endif
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom18">IFSC</label>
                                            <input type="text" class="form-control @error('ifsc') is-invalid @enderror" id="validationCustom18"
                                                placeholder="IFSC" name="ifsc" value="{{ old('ifsc') }}" required >
                                                @if ($errors->has('ifsc'))
                                                <span class="text-danger">{{ $errors->first('ifsc') }}</span>
                                                @endif
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom19">Benificiary Name</label>
                                            <input type="text" class="form-control @error('benificiary_name') is-invalid @enderror"
                                                id="validationCustom19"name="benificiary_name"
                                                placeholder="Benificiary Name" value="{{ old('benificiary_name') }}"  required>
                                                @if ($errors->has('benificiary_name'))
                                                <span class="text-danger">{{ $errors->first('benificiary_name') }}</span>
                                                @endif
                                        </div>
                                        {{-- <div class="col-md-6 mb-3">
                                            <label for="validationCustom20">State</label>
                                            <input type="text" class="form-control" id="validationCustom20"
                                                name="state" placeholder="State" >
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom21">City</label>
                                            <input type="text" class="form-control" id="validationCustom21"
                                                name="city" placeholder="City" >
                                        </div> --}}
                                    </div> <!-- /.form-row -->
                                    <div class="mb-2">
                                        <button type="submit" class=" btn btn-primary">Save</button>
                                        <a href="{{ route('managelocations.index') }}" class="btn btn-secondary">Close</a>
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

{{-- <script type="text/javascript">
    $('.timepicker').timepicker({
        format: 'HH:mm:ss'
    }); 
    </script> --}}

@endsection
