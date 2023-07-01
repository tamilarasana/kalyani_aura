@extends('layouts.dashboard')
@section('title')
    Kalyani Aura
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">

                {{-- <form action="{{ route('manageinventories.update', $inventory->id) }}" method="post"
                    class="needs-validation" novalidate>
                    {{ csrf_field() }}
                    @method('PUT') --}}
                    <div class="row align-items-center mb-2">
                        <div class="col">
                            <h2 class="h5 page-title">Manage Invntory</h2>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <strong class="card-title">Edit Inventory  </strong>
                                </div>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label for="validationCustom3">Title</label>
                                            <input type="text" class="form-control" id="validationCustom3" value="{{ $inventory->title }}" disabled name="title"
                                                placeholder="Name" minlength="3" required>
                                            <div class="invalid-feedback"> Please enter a Title Minimum 3 Characters</div>
                                            <div class="valid-feedback"> Looks good! </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom04">Rescorce Type</label>
                                            <select  class="form-control"  id="validationCustom04" name="res_type" disabled required>
                                                <option selected  value="">Choose...</option>
                                                <option  value="Desk" {{ $inventory->res_type == 'Desk' ? 'selected' : '' }}>Desk</option>
                                                <option  value="Area" {{ $inventory->res_type == 'Area' ? 'selected' : '' }}>Area</option>
                                                <option  value="Other" {{ $inventory->res_type == 'Other' ? 'selected' : '' }}>Other Service</option>
                                            </select>
                                            <div class="invalid-feedback"> Please select a valid state. </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom3">Hsn Code</label>
                                            <input type="text" class="form-control" id="validationCustom3"  value="{{ $inventory->hsn_code }}"name="hsn_code"
                                                placeholder="Hsn Code" disabled required>
                                            <div class="invalid-feedback"> Please enter a Hsn Code Minimum 3 Characters
                                            </div>
                                            <div class="valid-feedback"> Looks good! </div>
                                        </div>

                                    </div> <!-- /.form-row -->
                                    <div class="mb-2">
                                        {{-- <button type="submit" class="btn btn-primary">Add</button> --}}
                                        <a href="{{ route("manageinventories.index")}}" class="btn btn-secondary">Cancel</a>                         

                                    </div>
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
