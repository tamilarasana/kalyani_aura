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
                        <h2 class="h5 page-title">Manage Plan</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow mb-4">
                            <div class="card-header">
                                <strong class="card-title">Edit Plan </strong>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom04">Rescorce Type</label>
                                        <select class="form-control" id="validationCustom04" name="inventory_id" disabled
                                            required>
                                            <option selected disabled value="">Choose...</option>
                                            @foreach ($inventory as $key => $datas)
                                                <option {{ $plans->inventory_id === $datas->id ? 'selected' : '' }} disabled
                                                    value="{{ $datas->id }}">{{ $datas->title }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback"> Please select a valid state. </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom04">Location</label>
                                        <select class="form-control" id="validationCustom04" name="location" disabled
                                            required>
                                            <option selected disabled value="">Choose...</option>
                                            @foreach ($location as $key => $data)
                                                <option {{ $plans->location === $data->id ? 'selected' : '' }}
                                                    value="{{ $data->id }}">{{ $data->location_name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback"> Please select a valid state. </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom3">Resource price</label>
                                        <input type="number" class="form-control" id="validationCustom3"
                                            name="resource_price" value="{{ $plans->resource_price }}" placeholder="Number"
                                            disabled required>
                                        <div class="invalid-feedback"> Please enter a Hsn Code Minimum 3 Characters</div>
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom3">No of Seats</label>
                                        <input type="number" class="form-control" id="validationCustom3" name="num_seats"
                                            value="{{ $plans->num_seats }}" placeholder="Count" disabled required>
                                        <div class="invalid-feedback"> Please enter a Hsn Code Minimum 3 Characters</div>
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom3">Area</label>
                                        <input type="number" class="form-control" id="validationCustom3" name="area"
                                            value="{{ $plans->area }}" placeholder="in SqFt" disabled required>
                                        <div class="invalid-feedback"> Please enter a Hsn Code Minimum 3 Characters</div>
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationTextarea1">Description</label>
                                        <textarea class="form-control" id="validationTextarea1" placeholder="Description" name="description" rows="3"
                                            disabled required>{{ $plans->description }}</textarea>
                                        <div class="invalid-feedback"> Please enter a message in the textarea. </div>
                                        <div class="valid-feedback"> Looks good! </div>
                                    </div>

                                </div> <!-- /.form-row -->
                                <div class="mb-2">

                                    <a href="{{ route('manageplan.index') }}" class="btn btn-secondary">Cancel</a>
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
