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
                    <div class="col-auto">
                        <div class="pull-right" data-target="#varyModal" data-toggle="modal">
                            <a href="{{ route('manageplan.create') }}" class="btn btn-success" > Add Plan </a>
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
                                            <th>Resource Type</th>
                                            {{-- <th>Location</th> --}}
                                            <th>Resource price</th>
                                            <th>No of Seats</th>
                                            <th>Area</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($plans as $plan)
                                            <tr>
                                                <td> <a href="{{route('manageplan.show', $plan->id)}}" >{{ $plan->inventory->res_type }}</a></td>
                                                <td>{{ $plan->resource_price }}</td>
                                                <td>{{ $plan->num_seats }}</td>
                                                <td>{{ $plan->area }}</td>
                                                <td><button class="btn btn-sm dropdown-toggle more-horizontal"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <span class="text-muted sr-only">Action</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="{{route('manageplan.edit', $plan->id)}}" class="dropdown-item" >Edit</a>
                                                        {{-- <a href="{{route('manageplan.show', $plan->id)}}" class="dropdown-item" href="#">Show</a>                                                         --}}
                                                        <a  href="{{ route('manageplan.destroy', ['id' => $plan->id]) }}"  class="dropdown-item" >Remove</a> 
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
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
