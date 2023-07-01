@extends('layouts.dashboard')
@section('title')
    Kalyani Aura
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row">
                    <!-- Small table -->
                    <div class="col-md-6">
                        <div class="card shadow">
                            <div class="card-header">
                                <strong class="card-title">Support Scop </strong>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-10 mb-3 ">
                                        <div id="show_success_alert"></div>
                                        {{-- <form class="needs-validation" novalidate id="register_form"> --}}
                                            <div class="scope-input" id="register_form">
                                            <input type="text" class="form-control " id="scope_name"  value="{{ old('scope_name') }}"
                                                placeholder="Support Profile" required>
                                                <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-3 ">
                                        <div class="pull-right" data-toggle="modal">
                                            <button type="submit"class="btn btn-success" id="addNewScop"> Save </button>
                                        </div>
                                    </div>
                                {{-- </form> --}}
                                    <div class="col-md-12 mb-4 text-center" id="supportScop">

                                        <!-- .row-->
                                        {{-- <div class="row">
                                            <div class="col-12" id="suppord_data">
                                                <div class=" flex-column " id="supportScop">
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div> <!-- /.form-row -->
                        </div>
                    </div>
                </div>
            </div> <!-- .col-12 -->
        </div> <!-- .row -->

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="varyModalLabel">Edit Support Scop</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="col-md-12 modalbody">
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- .container-fluid -->
@endsection

@section('scripts')
    <script>
        // var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        // Get All Support Data
        $(document).ready(function() {
            fetch_data();

            function fetch_data() {
                $.ajax({
                    type: 'post',
                    url: "{{ route('supportscop.data') }}",
                    data: {
                        '_token': "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        $('#supportScop').html('');
                        if (response.data.length > 0) {
                            $.each(response.data, function(key, value) {
                                $("#supportScop").append(
                                    '<div class="form-row align-items-center "><div class="col supportscope" data-id=' +
                                    value.id + '> <b  >' + value.scope_name +
                                    '</b></div><span class="circle circle-sm addscope" id="editSupportScop" data-id=' +
                                    value.id + ' ><i class="fe fe-edit"></i></span></div>');
                            });
                        } else {
                            $("#supportCategory").append("Data Not Found");
                        }
                    },
                    error: function() {
                        console.log(data);
                    }
                });
            }

            //  Add New Support 
            $(document).on("click", "#addNewScop", function() {
                var scope_name = $('#scope_name').val();
                
                    $.ajax({
                        type: 'post',
                        url: "{{ route('supportscop.store') }}",
                        data: {
                            scope_name: scope_name
                        },
                        success: function(response) {
                            if(response.status == 400){
                                showError('scope_name', response.message.scope_name);
                            }else if(response.status == 200){
                                // $("#show_success_alert").html(showMessage('success',response.message));
                                fetch_data();
                                removeValidtionClasses("#register_form");
                            $('#scope_name').val('');
                            }
                          
                        }
                    });

            });

            //Edit Support Scop
            $(document).on("click", "#editSupportScop", function() {
                var id = $(this).attr("data-id");
                let url = '{{ route('editsupportscop.edit') }}';
                $.ajax({
                    url: url + '/' + id,
                    method: 'get',
                    data: {
                        id: id,
                    },
                    success: function(response) {
                        $("#myModal").modal("show");
                        $("#myModal .modalbody").html(
                            '<div class="card-body "><div class="form-row"><div class="col-md-12  "><div class="scope-input"><input type="text" class="form-control scope_name" placeholder="Support Profile" value="' +
                            response.data.scope_name +
                            '" required></div></div></div>  </div><div class="modal-footer"><button type="button" class="btn mb-2 btn-sm btn-secondary" data-dismiss="modal">Cancel</button><button type="button" class="btn mb-2 btn-sm btn-primary updateSupportScop" data-id=' +
                            response.data.id +
                            '>Update</button><button type="button" class="btn mb-2 btn-sm btn-danger deleteProfile"  data-id=' +
                            response.data.id + '>Delete</button></div>');

                            removeValidtionClasses("#register_form");

                    }
                });
            });

            // Update Support Scop
            $(document).on("click", ".updateSupportScop", function() {
                var id = $(this).attr("data-id");
                var scope_name = $('.scope_name').val();
                console.log(scope_name);
                let url = '{{ route('updatesupportscop.update') }}';
                $.ajax({
                    url: url + '/' + id,
                    method: 'post',
                    data: {
                        id: id,
                        scope_name: scope_name
                    },
                    success: function(response) {
                        $("#myModal").modal("hide");
                        fetch_data();
                        removeValidtionClasses("#register_form");

                    },
                    error: function(response) {
                        $("#myModal").modal("hide");
                    }
                });
            });

            //Delete Support Scop
            $(document).on("click", ".deleteProfile", function() {
                var id = $(this).attr("data-id");
                let url = '{{ route('deletesupportscop.delete') }}';
                $.ajax({
                    url: url + '/' + id,
                    method: 'delete',
                    data: {
                        id: id,
                    },
                    success: function(response) {
                        $("#myModal").modal("hide");
                        fetch_data();
                    }
                });
            });

            $(document).on("click", ".addscope", function() {
                $('.addscope.active').removeClass("active");
                $(this).addClass("active")
            });


        });
    </script>
    <style>

    </style>
@endsection
