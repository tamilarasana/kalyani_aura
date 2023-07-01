@extends('layouts.dashboard')
@section('title')
    Kalyani Aura
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <form action="{{route('visitor.update', $visitor->id)}}" method = "post" class="needs-validation" novalidate>
                    {{csrf_field()}}
				    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <strong class="card-title">Edit Visitor Record
                                    </strong>
                                </div>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3 ">
                                            <label for="validationCustom01">First Name</label>
                                            <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                                id="validationCustom01"name="first_name" placeholder="First Name" value="{{ $visitor->first_name }}" required>
                                                <span class="text-danger">@error('first_name'){{ $message }} @enderror</span>
                                            </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom02">Last Name</label>
                                            <input type="text" class="form-control  @error('last_name') is-invalid @enderror" id="validationCustom02"
                                                name="last_name"   value="{{ $visitor->last_name }}" placeholder="Last Name" required>
                                                <span class="text-danger">@error('last_name'){{ $message }} @enderror</span>
                                            </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom03">Reason For Visit</label>
                                            <select class="form-control @error('reason_for_visit') is-invalid @enderror" id="validationCustom003" name="reason_for_visit"
                                                required>
                                                <option selected disabled value="">Choose...</option>
                                                @foreach($reasonvisitors as $key => $data)
                                                <option value="{{$data->id}}">{{$data->purpose}}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">@error('reason_for_visit'){{ $message }} @enderror</span>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom04">Visitor From</label>
                                            <input type="text" class="form-control @error('visit_from') is-invalid @enderror" id="validationCustom04" value="{{ $visitor->visit_from }}"
                                                name="visit_from" placeholder="Visitor From" required>
                                                <span class="text-danger">@error('visit_from'){{ $message }} @enderror</span>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom05">Date of Check-in</label>
                                            <input type="date" class="form-control @error('date') is-invalid @enderror " id="validationCustom05"  value="{{ $visitor->date }}"
                                                name="date" required>
                                                <span class="text-danger">@error('date'){{ $message }} @enderror</span>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom06">Time of Check-in</label>
                                            <input type="time" class="form-control @error('time_in') is-invalid @enderror" id="validationCustom06" name="time_in"  value="{{ $visitor->time_in }}"
                                                required>
                                                <span class="text-danger">@error('time_in'){{ $message }} @enderror</span>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom07">Time of Check-out</label>
                                            <input type="time" class="form-control @error('time_out') is-invalid @enderror" id="validationCustom07" name="time_out"  value="{{ $visitor->time_out }}"
                                                required>
                                                <span class="text-danger">@error('time_out'){{ $message }} @enderror</span>
                                        </div>
                                    </div> <!-- /.form-row -->
                                    <div class="mb-2">
                                        <button type="submit" class=" btn btn-primary">Save</button>
                                        <a href="#" class="btn btn-secondary">Cancel </a>
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
    {{-- <script>
    $(function() {
  $('input.timepicker').timepicker({
      timeFormat: 'h:mm',
  });
});
</script> --}}
@endsection
