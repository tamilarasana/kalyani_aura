@extends('layouts.dashboard')
@section('title')
    Kalyani Aura
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row align-items-center ">
                    <div class="col">
                        <h2 class="h5 page-title">Visitor Log</h2>
                    </div>
                    <div class="col-auto">
                        <div class="pull-right">
                            <a href="{{ route('reasonvisits') }}" class="btn btn-outline-success"> Reason for Visit</a>
                            <a class="btn btn-success" href="{{ route('visitor.create') }}"> Add </a>
                        </div>
                    </div>
                </div>
                <div class="row my-2">
                    <!-- Small table -->
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="mb-3">
                                    {{-- <div class="col"> --}}
                                    <form action="{{ route('visitor.filter') }}" method="get"
                                        class="needs-validation form-inline" novalidate>
                                        {{ csrf_field() }}
                                        <div class="form-row">
                                            <div class=" col-auto ">
                                                <input type="date" class="form-control" id="validationCustom3"
                                                    name="start_date" required>
                                            </div>
                                            <div class="col-auto ">
                                                <input type="date" class="form-control" id="validationCustom3"
                                                    name="end_date" required>
                                            </div>
                                            <div class="col col-auto">
                                                <div class="dropdown float-right">
                                                    <button type="submit" class="btn btn-outline-success ">Filter</button>
                                                    <a class="btn btn-outline-primary" href="{{ route('exportvisitor') }}">
                                                        Export to CSV </a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    {{-- </div> --}}
                                </div>
                                <table class="table datatables" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Visitor's Name </th>
                                            <th>Reason for Visit</th>
                                            <th>Visitot From</th>
                                            <th>Time In</th>
                                            <th>Time Out</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($visitors as $visitors)
                                            <tr>
                                                <td>{{ date('d-m-Y', strtotime($visitors->date)) }}</td>
                                                <td>{{ $visitors->first_name }} {{ $visitors->last_name }}</td>
                                                <td>{{ $visitors->reasonvisit->purpose }}</td>
                                                <td>{{ $visitors->visit_from }}</td>
                                                <td>{{ date('h:i A', strtotime($visitors->time_in)) }}</td>
                                                <td>{{ date('h:i A', strtotime($visitors->time_out)) }}</td>
                                                <td><button class="btn btn-sm dropdown-toggle more-horizontal"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <span class="text-muted sr-only">Action</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        {{-- <a href="#" class="dropdown-item">Edit</a> --}}
                                                        <a href="{{ route('visitor.edit', $visitors->id) }}"
                                                            class="dropdown-item">Edit</a>
                                                        <a href="{{ route('visitor.destroy', ['id' => $visitors->id]) }}"
                                                            class="dropdown-item" href="#">Remove</a>
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
