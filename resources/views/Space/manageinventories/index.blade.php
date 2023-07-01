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
                        <h2 class="h5 page-title">Manage Invntory</h2>
                    </div>
                    <div class="col-auto">
                        <div class="pull-right" data-target="#varyModal" data-toggle="modal">
                            <a href="{{ route('manageinventories.create') }}" class="btn btn-success" > Add
                                Invntory </a>
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
                                            <th>Title</th>
                                            <th>Resorce Type</th>
                                            <th>Hsn Code</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($amentites as $amentites)
                                            <tr>
                                                <td> <a href="{{ route('manageinventories.show', $amentites->id) }}" >{{ $amentites->title }}</a></td>
                                                <td>{{ $amentites->res_type }}</td>
                                                <td>{{ $amentites->hsn_code }}</td>
                                                <td><button class="btn btn-sm dropdown-toggle more-horizontal"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <span class="text-muted sr-only">Action</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right align-items-center mb-2">
                                                        <a href="{{ route('manageinventories.edit', $amentites->id) }}"
                                                            class="dropdown-item" href="#">Edit</a>
                                                        <a href="{{ route('manageinventories.destroy', ['id' => $amentites->id]) }}"
                                                            class="dropdown-item" >Remove</a>
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
