@extends('layouts.dashboard')
@section('title')
    Kalyani Aura
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            {{-- <div class="row align-items-center mb-2">
                <div class="col">
                    <h2 class="h5 page-title">Announcements</h2>
                </div>
            </div> --}}
            <div class="col-12">
                @if (isset($announcement))
                    <form action="{{ route('announcement.update', $announcement->id) }}" method="post"
                        class="needs-validation" enctype="multipart/form-data" novalidate>
                        {{ csrf_field() }}
                        @method('PUT')
                    @else
                        <form action="{{ route('announcement.store') }}" method="post" class="needs-validation"
                            enctype="multipart/form-data" novalidate>
                            {{ csrf_field() }}
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow mb-4">
                            <div class="card-header">
                                <strong
                                    class="card-title">{{ isset($announcement->id) ? 'Edit Announcement' : 'Add Announcement' }}</strong>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">Title</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            id="validationCustom01"name="title"
                                            value="{{ old('title', isset($announcement->title) ? $announcement->title : null) }}"
                                            placeholder="Enter Title" required>
                                        <span class="text-danger">
                                            @error('title')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom02">Location</label>
                                        <select class="form-control @error('location') is-invalid @enderror"
                                            id="validationCustom02" name="location" required>
                                            @if (isset($announcement))
                                            <option selected disabled value="">Choose...</option>
                                            @foreach($location as $key => $data)
                                            <option  {{ $announcement->location === $data->id? 'selected' : ''}}  value="{{$data->id}}">{{$data->location_name}}</option>
                                             @endforeach
                                                @foreach ($location as $key => $datas)
                                                    <option {{ $announcement->location === $datas->id ? 'selected' : '' }}
                                                        value="{{ $datas->id }}">{{ $datas->location_name }}
                                                    </option>
                                                @endforeach
                                            @else
                                            <option selected disabled value="">Choose...</option>
                                                @foreach ($location as $key => $data)
                                                    <option value="{{ $data->id }}"
                                                        {{ old('location') == $data->id ? 'selected' : '' }}>
                                                        {{ $data->location_name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <span class="text-danger">
                                            @error('location')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom03">Schedule Announcement Time </label>
                                        <input type="time"
                                            class="form-control @error('schedule_time') is-invalid @enderror"
                                            id="validationCustom03"
                                            value="{{ old('schedule_time', isset($announcement->schedule_time) ? $announcement->schedule_time : null) }}"
                                            name="schedule_time" required>
                                        <span class="text-danger">
                                            @error('schedule_time')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom04">Schedule Announcement Date </label>
                                        <input type="date"
                                            class="form-control @error('schedule_date') is-invalid @enderror"
                                            id="validationCustom04" name="schedule_date"
                                            value="{{ old('schedule_date', isset($announcement->schedule_date) ? $announcement->schedule_date : null) }}"
                                            required>
                                        <span class="text-danger">
                                            @error('schedule_date')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom05">Expiration Time</label>
                                        <input type="time"
                                            class="timeformat form-control @error('expiration_time') is-invalid @enderror"
                                            id="date"
                                            value="{{ old('expiration_time', isset($announcement->expiration_time) ? $announcement->expiration_time : '23:59') }}"
                                            name="expiration_time" min="00:00" max="23:59" required>
                                        <span class="text-danger">
                                            @error('expiration_time')
                                                {{ $message }}
                                            @enderror
                                        </span>

                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom06">Expiration Date</label>
                                        <input type="date"
                                            class="form-control timeformat  @error('expiration_date') is-invalid @enderror"
                                            id="validationCustom06"
                                            value="{{ old('expiration_date', isset($announcement->expiration_date) ? $announcement->expiration_date : null) }}"
                                            name="expiration_date" required>
                                        <span class="text-danger">
                                            @error('expiration_date')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom07">Image</label>
                                        <div class="form-group mb-3">
                                            @if (isset($announcement->image))
                                                <input type="file" id="validationCustom07"
                                                    class="@error('image') is-invalid @enderror" name="image">
                                                <img class="aimg "src="{{ str_replace('public/', '', asset('storage/' . $announcement->image)) }}"
                                                    width="100" alt="...">
                                            @else
                                                <input type="file" id="validationCustom07" name="image"
                                                    class="@error('image') is-invalid @enderror" required>
                                            @endif
                                        </div>
                                        <span class="text-danger">
                                            @error('image')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group mb-3">
                                            <label for="validationTextarea1">Message</label>
                                            <textarea class="form-control @error('message') is-invalid @enderror" id="validationTextarea1"
                                                placeholder="Take a note here" name="message" rows="4" required> {{ isset($announcement->message) ? $announcement->message : old('message') }}</textarea>
                                        </div>
                                        <span class="text-danger">
                                            @error('message')
                                                {{ $message }}
                                            @enderror
                                        </span>

                                    </div>
                                </div> <!-- /.form-row -->
                                <div class="mb-2">
                                    <button type="submit" class=" btn btn-primary">Save</button>
                                    <a href="{{ route('announcement.index') }}" class="btn btn-secondary">Close</a>
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
