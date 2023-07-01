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
                        <h2 class="h5 page-title">Manage Team</h2>
                    </div>
                    <div class="col-auto">
                        <div class="pull-right">
                            {{-- <a href="javascript:void(0)" class="btn btn-success" data-toggle="modal"
                                id="varyModal"> Roles</a> --}}

                            <a href="{{ route('manageteam.create') }}" class="btn btn-success" > New Team</a>
                        </div>
                    </div>
                </div>

                <div class="modal fade"  data-keyboard="false" data-backdrop="static"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true" id="ajaxModel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="defaultModalLabel">Role</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="row ">
                                <div class="col-md-12 ">
                                        <div class="card-body ">
                                        <form class="needs-validation" class="needs-validation" novalidate>
                                            <div class="form-row">
                                            <div class="col-md-10 mb-2  ">
                                                <input type="text" class="form-control" id="validationCustom3" name="first_name" placeholder="Create a new Role...." required>
                                                <div class="valid-feedback"> Looks good! </div>
                                            </div>
                                            <div class="col-md-2  ">
                                                    <button class="btn  btn-primary float-md-right  " type="submit">Add Role</button>
                                            </div> <!-- /.col -->
                                            </div>
                                        </form>
                                        </div> <!-- /.card-body -->
                                </div> <!-- /.col -->
                                
                              </div> <!-- end section -->
                            <div class="modal-body"> 
                                    <table class="table datatables" id="dataTableModel">
                                        <thead>
                                            <tr>
                                                <th >Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td >Admin</td> 
                                            </tr>
                                            <tr>
                                                <td>Admin</td>
                                            </tr> 
                                            <tr>
                                                <td>Admin</td>
                                            </tr> 
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div> <!-- medium modal -->

                <div class="row my-4">
                    <!-- Small table -->
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <!-- table -->
                                <table class="table datatables" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @if (count($teams) > 0) --}}
                                            @foreach ($teams as $teams)
                                                <tr>
                                                    <td><a href="{{ route('manageteam.show', $teams->id) }}" style="color:#6c757d">{{ $teams->first_name }} &nbsp;{{ $teams->last_name }}</a></td>
                                                    <td>{{ $teams->email }}</td>
                                                    <td>{{ $teams->mobile }}</td>
                                                    <td><button class="btn btn-sm dropdown-toggle more-horizontal"
                                                            type="button" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <span class="text-muted sr-only">Action</span>
                                                        </button>
                                                        <div
                                                            class="dropdown-menu dropdown-menu-right align-items-center mb-2">
                                                            <a href="{{ route('manageteam.edit', $teams->id) }}"
                                                                class="dropdown-item" >Edit</a>
                                                            <a href="{{ route('manageteam.destroy', ['id' => $teams->id]) }}"
                                                                class="dropdown-item" >Remove</a>
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

    {{-- <style>
        @media (max-width: 991.98px) {.table {
            overflow-x: auto;
            display: table;
        }
    }
        </style> --}}
@endsection

@section('scripts')

<script>
    $(document).ready(function(){
        $("#varyModal").click(function(){
            // $("#modelShow").hide();
            $('#ajaxModel').modal('show');
            // $("#modelShow").css("display", "block");
            // $(".fade:not(.show)").css("opacity", "1");
            
        });
    
    });
    </script>
@endsection

