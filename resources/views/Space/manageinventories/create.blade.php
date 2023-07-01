@extends('layouts.dashboard')
@section('title')
    Kalyani Aura
@endsection
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                
                <form action="{{route('manageinventories.store')}}" method = "post" class="needs-validation" novalidate>
                    {{csrf_field()}}
                    <div class="row align-items-center mb-2">
                        <div class="col">
                            <h2 class="h5 page-title">Manage Invntory</h2>
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
                                    <div class="col-md-12 mb-3">
                                    <label for="validationCustom01">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="validationCustom01"  name="title" value="{{ old('title') }}" placeholder="Name" minlength="3" required>
                                    @if ($errors->has('title'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif    
                                </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom02">Rescorce Type</label>
                                        <select  class="form-control @error('res_type') is-invalid @enderror"   id="validationCustom02" name="res_type"  required>
                                            <option selected disabled value="">Choose...</option>
                                            <option value="Desk"  @if (old('res_type') == 'Desk') selected="selected" @endif>Desk</option>
                                            <option value="Area"  @if (old('res_type') == 'Area') selected="selected" @endif>Area</option>
                                            <option value="Other" @if (old('res_type') == 'Other') selected="selected" @endif>Other Service</option>
                                        </select>
                                        @if ($errors->has('res_type'))
                                        <span class="text-danger">{{ $errors->first('res_type') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom03">Hsn Code</label>
                                        <input type="text" class="form-control @error('hsn_code') is-invalid @enderror" id="validationCustom03" name="hsn_code"  value="{{ old('hsn_code') }}" placeholder="Hsn Code" required>
                                        @if ($errors->has('hsn_code'))
                                        <span class="text-danger">{{ $errors->first('hsn_code') }}</span>
                                        @endif
                                    </div>
                                 
                                </div> <!-- /.form-row --> 
                                <div class="mb-2">
 
                                <button type="submit" class="btn btn-primary">Save</button>    
                                <a href="{{ route('manageinventories.index') }}" class="btn btn-secondary">Close</a>
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
