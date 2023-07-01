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
                        <h2 class="h5 page-title">User Role</h2>
                    </div>
                    <div class="col-auto">
                        <div class="pull-right">
                            <a href="{{ route('manageuser.index') }}" class="btn btn-secondary">Back</a>
                            <a class="btn btn-success" href="{{ route('userdata.create') }}"> Add </a>
                        </div>
                    </div>
                </div>


                <div class="row my-4">
                    <!-- Small table -->
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <!-- table -->
                                <table class="table datatables" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th>Role Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @if (count($userdata) > 0) --}}
                                        @foreach ($userdata as $userdata)
                                            <tr>
                                                <td> {{ $userdata->role_name }} </td>
                                                @if ($userdata->status == 'enabled')
                                                    <td>Enabled</td>
                                                @elseif($userdata->status == 'disabled')
                                                    <td>Disabled</td>
                                                @endif
                                                <td><button class="btn btn-sm dropdown-toggle more-horizontal"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <span class="text-muted sr-only">Action</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right align-items-center mb-2">
                                                        <a href="{{ route('userdata.edit', $userdata->id) }}"
                                                            class="dropdown-item">Edit</a>
                                                        {{-- <a href="{{route('userdata.show', $userdata->id)}}" class="dropdown-item" href="#">Assign</a> --}}
                                                        <a href="{{ route('userdata.destroy', ['id' => $userdata->id]) }}"
                                                            class="dropdown-item">Remove</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        {{-- @else
                                            <strong>There is no Data.</strong>
                                        @endif --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- simple table -->
                </div> <!-- end section -->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
@endsection
@section('scripts')
@endsection
