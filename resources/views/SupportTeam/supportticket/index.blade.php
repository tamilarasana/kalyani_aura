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
                        <h2 class="h5 page-title">Support Tickets</h2>
                    </div>
                    <div class="col-auto">
                        <div class="pull-right" data-target="#varyModal" data-toggle="modal">
                            <a href="{{ route('exportticket') }}" class="btn btn-success" > Export</a>
                            {{-- <a href="#" class="btn btn-success" > Filters </a> --}}
                        </div>
                    </div>
                </div>

                <div class="row my-4">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <table class="table datatables" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th>Ticket No</th>
                                            <th>Issue Type</th>
                                            <th>Status</th>
                                            <th>Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach ($tickets as $ticket)
                                                <tr>
                                                    <td>{{ $ticket->id }}&nbsp; {{ $ticket->user->name }}<br>
                                                        {{-- {{ $ticket->location->location_name }} --}}
                                                    </td>
                                                    <td>{{ $ticket->subcategory->sub_category }}</td>
                                                    <td>{{ $ticket->status }}</td>
                                                    {{-- <td>{{ $ticket->assignedPerson->assigned_to }}</td> --}}
                                                    <td>{{ $ticket->updated_at }}</td>
                                                    <td><button class="btn btn-sm dropdown-toggle more-horizontal"
                                                            type="button" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <span class="text-muted sr-only">Action</span>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="javascript:void(0)" class="dropdown-item ticketAssign"
                                                                data-id="{{ $ticket->id }}">Assign The Ticket</a>
                                                            <a href="javascript:void(0)" class="dropdown-item ticketClose"
                                                                data-id="{{ $ticket->id }}">Close The Ticket</a>
                                                            <a href="javascript:void(0)" class="dropdown-item ticketShow"
                                                                data-id="{{ $ticket->id }}">Show The Ticket</a>
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
        <div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog"
            aria-labelledby="varyModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="varyModalLabel">Ticket Assignment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="col-md-12 modalbody">
                        <div class="card-body">
                            {{-- <h5 class="modal-title mb-3" id="varyModalLabel">Ticket Assigment </h5> --}}
                            <div class="form-row">
                                <input class="supportticket_id" id="support_ticket_id" type="hidden">
                                <div class="col-md-6 mb-3 ">
                                    <label for="member">Chose a Member</label>
                                    <select class="form-control slectable-options" id="ticket_member" required>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom04">Priority</label>
                                    <select class="form-control" id="priority" required>
                                        <option selected disabled value="">Choose...</option>
                                        <option value="Normal">Normal</option>
                                        <option value="High">High</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3 ">
                                    <label for="assigned_date">Assigned Date</label>
                                    <div class="scope-input">
                                        <input class="form-control" id="assigned_date" type="date" name="date">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="assign_time">Assigned Time</label>
                                    <div class="scope-input">
                                        <input class="form-control" id="assign_time" type="time" name="time" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-2 mb-3 ">
                                    <div class="pull-right" data-toggle="modal">
                                        <button class="btn btn-success" id="ticketassignment"> Save </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- Ticket Closer --}}
        <div class="modal fade bd-example-modal-lg" id="ticketCloseModal" tabindex="-1" role="dialog"
            aria-labelledby="varyModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="varyModalLabel">Ticket Clouser</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="col-md-12 modalbody">
                        <div class="card-body">
                            {{-- <h5 class="modal-title mb-3" id="varyModalLabel">Ticket Clouser</h5> --}}
                            <div class="form-row">
                                <input type="hidden" class="ticketClose_id">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom04">Priority</label>
                                    <select class="form-control" id="close_priority" required>
                                        <option selected disabled value="">Choose...</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Assigned">Assigned</option>
                                        <option value="Closed">Closed</option>
                                        <option value="Due">Due</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3 ">
                                    <label for="closed_date">Closed Date</label>
                                    <div class="scope-input">
                                        <input class="form-control" id="closed_date" type="date" name="date">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3 ">
                                    <label for="closed_date">Closed Time</label>
                                    <div class="scope-input">
                                        <input class="form-control" id="closed_time" type="time" name="time"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-2 mb-3 ">
                                    <div class="pull-right" data-toggle="modal">
                                        <button class="btn btn-success" id="closeSupportticket"> Save </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Ticket Show --}}
        <div class="modal fade bd-example-modal-lg" id="ticketshowModal" tabindex="-1" role="dialog"
            aria-labelledby="varyModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="varyModalLabel">Support Ticket</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-body p-5">
                                <div class="row">
                                    <div class="col-12 text-center ">
                                        <h2 class="mb-0 text-uppercase">Ticket Details</h2>
                                    </div>
                                    <div class="col-12 text-center">
                                        <p class="mb-2">
                                        <p>Ticket ID : <strong id="ticket_id"></strong></p>
                                        <p>Created By : <strong id="name"></strong></p>
                                        <p>Status : <strong id="status"></strong></p>
                                        <p>Created Time : <strong id="created_time"></strong></p>
                                        <p>Created Date : <strong id="created_date"></strong></p>
                                        <p>Dscription : <strong id="description"></strong></p>
                                        <p>Category : <strong id="subcategory"></strong></p>
                                        <p>Location : <strong id="location"></strong></p>
                                        </p>
                                    </div>
                                </div> <!-- /.row -->
                            </div> <!-- /.card-body -->
                        </div> <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- .container-fluid -->
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $(document).on("click", ".ticketAssign", function() {
                var id = $(this).attr("data-id");
                $(".supportticket_id").html(id);
                $("#myModal").modal("show");
                let url = '{{ route('assignticket') }}';
                $.ajax({
                    url: url + '/' + id,
                    method: 'get',
                    data: {
                        id: id,
                    },
                    success: function(response) {
                        let options = "";
                        options += `<option selected disabled value="">Choose...</option>`;
                        $.each(response.data, function(key, value) {
                            options +=
                                `<option value="${value.id}">${value.user_name}</option>`;
                        });
                        $('.slectable-options').html(options);
                        $("#myModal").modal("show");
                    }
                });
            });

            $(document).on("click", "#ticketassignment", function() {
                var id = $('#support_ticket_id').text();
                var assigned_person_id = $('#ticket_member').val();
                var status = $('#priority').val();
                var assigned_date = $('#assigned_date').val();
                var assign_time = $('#assign_time').val();
                let url = '{{ route('assignticket.store') }}';
                $.ajax({
                    url: url + '/' + id,
                    method: 'post',
                    data: {
                        user_id:id,
                        support_ticket_id: id,
                        assigned_person_id:assigned_person_id,
                        status:status,
                        assigned_date:assigned_date, 
                        assign_time:assign_time, 
                    },
                    success: function(response) {
                        console.log(response);
                        location.reload();
                    }
                });

            });

            //Ticket Close 
            $(document).on("click", ".ticketClose", function() {
                $("#ticketCloseModal").modal("show");
                var id = $(this).attr("data-id");
                $(".ticketClose_id").html(id);
            });

            $(document).on("click", "#closeSupportticket", function() {
                var id = $('.ticketClose_id').text();
                var status = $('#close_priority').val();
                var closed_date = $('#closed_date ').val();
                var closed_time = $('#closed_time').val();
                let url = '{{ route('closeticket') }}';
                $.ajax({
                    url: url + '/' + id,
                    method: 'post',
                    data: {
                        id: id,
                        status: status,
                        closed_date: closed_date,
                        closed_time: closed_time,
                    },
                    success: function(response) {
                        console.log(response);
                        location.reload();
                    }
                });
            });

            //Ticket Show
            $(document).on("click", ".ticketShow", function() {
                var id = $(this).attr("data-id");
                $("#ticketshowModal").modal("show");
                let url = '{{ route('showticket') }}';
                $.ajax({
                    url: url + '/' + id,
                    method: 'get',
                    data: {
                        id: id,
                    },
                    success: function(response) {
                        console.log(response.data);
                        var date = new Date(response.data.created_at);
                        var formattedDate = date.toDateString();
                        var formattedTime = date.toLocaleTimeString();
                        // $('#updated-time-span').text(formattedDate);
                        $('#ticket_id').html(response.data.id);
                        $('#name').html(response.data.user.name);
                        $('#status').html(response.data.status);
                        $('#created_time').html(formattedTime);
                        $('#created_date').html(formattedDate);
                        $('#description').html(response.data.ticket_description);
                        $('#location').html(response.data.location.location_name);
                        $('#subcategory').html(response.data.subcategory.sub_category);
                    }
                });
            });
        });
    </script>
@endsection
