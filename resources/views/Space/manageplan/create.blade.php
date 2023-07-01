@extends('layouts.dashboard')
@section('title')
    Kalyani Aura
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">

                <form action="{{ route('manageplan.store') }}" method="post" class="needs-validation" novalidate>
                    {{ csrf_field() }}
                    <div class="row align-items-center mb-2">
                        <div class="col">
                            <h2 class="h5 page-title">Manage Location</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <strong class="card-title">Add Inventory </strong>
                                </div>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">Rescorce Type</label>
                                            <select class="form-control @error('inventory_id') is-invalid @enderror" id="validationCustom01" name="inventory_id"
                                                required>
                                                <option selected disabled value="">Choose...</option>
                                                @foreach ($inventory as $key => $datas)
                                                    <option value="{{ $datas->id }}" {{(old('inventory_id')==$datas->id)? 'selected':''}}>{{ $datas->res_type }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('inventory_id'))
                                                <span class="text-danger">{{ $errors->first('inventory_id') }}</span>
                                                @endif
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom02">Location</label>
                                            <select class="form-control @error('location') is-invalid @enderror" id="validationCustom02" name="location" required>
                                                <option selected disabled value="">Choose...</option>
                                                @foreach ($location as $key => $data)
                                                    <option value="{{ $data->id }}" {{(old('location')==$data->id)? 'selected':''}}>{{ $data->location_name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('location'))
                                            <span class="text-danger">{{ $errors->first('location') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom03">Resource price</label>
                                            <input type="number" class="form-control @error('resource_price') is-invalid @enderror"  value="{{ old('resource_price') }}" id="validationCustom03"
                                                name="resource_price" placeholder="Number" required>
                                                @if ($errors->has('resource_price'))
                                                <span class="text-danger">{{ $errors->first('resource_price') }}</span>
                                                @endif
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom04">No of Seats</label>
                                            <input type="number" class="form-control @error('num_seats') is-invalid @enderror" id="validationCustom04"
                                                name="num_seats" placeholder="Count"   value="{{ old('num_seats') }}" required>
                                                @if ($errors->has('num_seats'))
                                                <span class="text-danger">{{ $errors->first('num_seats') }}</span>
                                                @endif
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom05">Area</label>
                                            <input type="text" class="form-control @error('area') is-invalid @enderror" id="validationCustom05"
                                                name="area" placeholder="in Sqft" value="{{ old('area') }}" required>
                                                @if ($errors->has('area'))
                                                <span class="text-danger">{{ $errors->first('area') }}</span>
                                                @endif
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="validationTextarea06">Description</label>
                                            <textarea class="form-control @error('description') is-invalid @enderror" id="validationTextarea06" placeholder="Description" name="description" rows="3"
                                                required>{{ old('description') }}</textarea>
                                                @if ($errors->has('description'))
                                                <span class="text-danger">{{ $errors->first('description') }}</span>
                                                @endif
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom07">Meeting Room Credits</label>
                                            <input type="number" class="form-control @error('meeting_room_credits') is-invalid @enderror"
                                                id="validationCustom07" name="meeting_room_credits"  value="{{ old('meeting_room_credits') }}"
                                                placeholder="Meeting Room Credits" required>
                                                @if ($errors->has('meeting_room_credits'))
                                                <span class="text-danger">{{ $errors->first('meeting_room_credits') }}</span>
                                                @endif
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom08">Printer Credits</label>
                                            <input type="number" class="form-control @error('printer_credits') is-invalid @enderror" id="validationCustom08"
                                                name="printer_credits" placeholder="Printer Credits" value="{{ old('printer_credits') }}" required>
                                                @if ($errors->has('printer_credits'))
                                                <span class="text-danger">{{ $errors->first('printer_credits') }}</span>
                                                @endif
                                        </div>
                                    </div> <!-- /.form-row -->
                                    <div class="mb-2">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <a href="{{ route('manageplan.index') }}" class="btn btn-secondary">Close</a>
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
