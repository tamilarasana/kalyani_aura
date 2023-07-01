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
                                <strong class="card-title">Support Scop</strong>
                            </div>
                            <div class="card-body">
                                <!-- table -->
                                <div class="form-row">
                                    <div class="col-md-10 mb-3">
                                        <div class="scope-input">
                                            <input type="text" class="form-control" id="scope_name"
                                                placeholder="Add a Scope" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <div class="pull-right">
                                            <button class="btn btn-success" id="addnewScop"> Save </button>
                                        </div>
                                    </div>

                                </div> <!-- /.form-row -->
                                <div class="table-responsive  " id="show_all">
                                    {{-- <table class="table datatables table-sm " id="dataTableSupportScop">
                            <thead>
                              <tr>
                                <th class=" col-md-6">Support Scop</th>
                                <th class="col-md-6">Action</th>
                              </tr>
                            </thead>
                            <tbody id="supportscopdata">
                            </tbody>
                          </table> --}}
                                </div>
                            </div>
                        </div>
                    </div> <!-- simple table -->

                    <!-- Small table -->
                    <div class="col-md-6">
                        <div class="card shadow">
                            <div class="card-header">
                                <strong class="card-title">Support Profile </strong>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-10 mb-3">
                                        <div class="scope-input">
                                            <input type="text" class="form-control" id="category"
                                                placeholder="Support Profile" required>
                                            <input type="hidden" class="scopeid" id="scope_id">
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <div class="pull-right" data-toggle="modal">
                                            <button class="btn btn-success" id="addNewcategory"> Save </button>
                                        </div>
                                    </div>
                                </div> <!-- /.form-row -->
                                <div class="table-responsive text-nowrap ">
                                    <!-- table -->
                                    <table class="table datatables table-sm " id="dataTableModel">
                                        <thead>
                                            <tr>
                                                <th class="col-md-6">Company Name</th>
                                                <th class=" col-md-6">Web Url</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Company Name</td>
                                                <td>
                                                    <i class="fe fe-16 fe-eye"></i>
                                                    <i class="fe fe-16 fe-edit"></i>
                                                    <i class="fe fe-15 fe-trash-2"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Company Name</td>
                                                <td>
                                                    <i class="fe fe-16 fe-eye"></i>
                                                    <i class="fe fe-16 fe-edit"></i>
                                                    <i class="fe fe-16 fe-trash-2"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Company Name</td>
                                                <td>
                                                    <i class="fe fe-16 fe-eye"></i>
                                                    <i class="fe fe-16 fe-edit"></i>
                                                    <i class="fe fe-16 fe-trash-2"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Company Name</td>
                                                <td>
                                                    <i class="fe fe-16 fe-eye"></i>
                                                    <i class="fe fe-16 fe-edit"></i>
                                                    <i class="fe fe-16 fe-trash-2"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Company Name</td>
                                                <td>
                                                    <i class="fe fe-16 fe-eye"></i>
                                                    <i class="fe fe-16 fe-edit"></i>
                                                    <i class="fe fe-16 fe-trash-2"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Company Name</td>
                                                <td>
                                                    <i class="fe fe-16 fe-eye"></i>
                                                    <i class="fe fe-16 fe-edit"></i>
                                                    <i class="fe fe-16 fe-trash-2"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Company Name</td>
                                                <td>
                                                    <i class="fe fe-16 fe-eye"></i>
                                                    <i class="fe fe-16 fe-edit"></i>
                                                    <i class="fe fe-16 fe-trash-2"></i>
                                                </td>
                                            </tr>



                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> <!-- simple table -->
                </div>
            </div> <!-- .col-12 -->
            <div class="col-12 ">
                <div class="row my-4">
                    <!-- Small table -->
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-header">
                                <strong class="card-title">Support Profile </strong>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-10 mb-3">
                                        <div class="scope-input">
                                            <input type="text" class="form-control" placeholder="Support Profile"
                                                required>
                                            <input type="hidden" class="scopeid">
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <div class="pull-right" data-toggle="modal">
                                            <button class="btn btn-success"> Save </button>
                                        </div>
                                    </div>
                                </div> <!-- /.form-row -->

                                {{-- <div class="table-responsive text-nowrap "> --}}
                                <!-- table -->
                                <table class="table datatables text-nowrap " id="dataTable1">
                                    <thead>
                                        <tr>
                                            <th class=" col-md-6">Company Name</th>
                                            <th class="col-md-6">Web Url</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Company Name</td>
                                            <td>
                                                <i class="fe fe-16 fe-eye"></i>
                                                <i class="fe fe-16 fe-edit"></i>
                                                <i class="fe fe-16 fe-trash-2"></i>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                {{-- </div> --}}
                            </div>
                        </div>
                    </div> <!-- simple table -->
                </div> <!-- end section -->

            </div> <!-- .col-12 -->

        </div> <!-- .row -->

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
                        $('#show_all').html(response);
                        $('#dataTableSupportScop').DataTable({
                            order: [0, 'desc'],
                            autoWidth: true,
                            "lengthMenu": [
                                [5, 8, 10, -1],
                                [10, 10, 20, "All"]
                            ]
                        });
                    },
                    error: function() {
                        console.log(data);
                    }
                });
            }



            //  Add New Support 
            $(document).on("click", "#addnewScop", function() {
                var scope_name = $('#scope_name').val();
                if (scope_name != '') {
                    $.ajax({
                        type: 'post',
                        url: "{{ route('supportscop.store') }}",
                        data: {
                            scope_name: scope_name
                        },
                        success: function(response) {
                            fetch_data();
                            $('#scope_name').val('');
                        }
                    });
                } else {
                    alert("Please Enter The Data")
                }

            });
            //Edit Support Scop
            $(document).on('click', '.editSUpportScop', function() {
                let id = $(this).attr('id');
                let url = '{{ route('supportscop.edit') }}'
                $.ajax({
                    url: url + '/' + id,
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log(response.data.scope_name);
                        $("#scope_name").val(response.data.scope_name);
                    }
                });
            });
            //Edit Support Scop
            $(document).on('click', '.deleteSUpportScop', function() {
                let id = $(this).attr('id');
                let url = '{{ route('supportscop.delete') }}'
                $.ajax({
                    url: url + '/' + id,
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log(response);
                        fetch_data();
                    }
                });
            });

            // Show Support Profile
            $(document).on("click", "#add-scope", function() {
                var id = $(this).attr("data-id");
                $(".scopeid").append(id);
                $('#showsupportprofile').show();
                let url = '{{ route('supportscopcat.data') }}'

                $.ajax({
                    // type: 'get',
                    // url: url + '/' + id,  
                    // data: {id: id,},  
                    url: 'supportscopcat/' + id,
                    type: 'get',
                    data: {
                        id: id,
                    },
                    success: function(response) {
                        $.each(response.data, function(key, value) {
                            $("#supportCategory").append(
                                '<div class="col-md-12 mt-2 addscope " id="add-scope" data-id=' +
                                value.id + '><strong>' + value.category +
                                '</strong></div>');
                        });

                    },
                    error: function() {
                        console.log(data);
                    }
                });

            });

            ///Support Category
            $(document).on("click", "#addNewcategory", function() {
                var category = $('#category').val();
                var scope_id = $('#scope_id').text();
                if (category != '') {
                    $.ajax({
                        type: 'post',
                        url: "{{ route('supportscopcat.store') }}",
                        data: {
                            category: category,
                            scope_id: scope_id
                        },
                        success: function(response) {
                            $("#supportCategory").append(
                                '<div class="col-md-12 mt-2 addscope " id="add-scope" data-id=' +
                                response.data.id + '><strong>' + response.data.category +
                                '</strong></div>');
                            $('#category').val('');
                        }
                    });
                } else {
                    alert("Please Enter The Data")
                }


            })
        });
    </script>
@endsection




$('input[name="pname"]')
$('#scopecategory').val(response.data.category);
$('#scopUpdate').val(response.data.id);
$('#scopDelete').val(response.data.id);
// $('.slectable-options').html();
let options = "";
options += `<option selected disabled value="">Choose...</option>`;
$.each(response.support_scop, function(key, value) {
    options +=
        `<option   value="${value.id}">${value.scope_name}</option>`;
});
$('.slectable-options').html(options);

$("#myModal").modal("show");




 {{-- <div class="card-body  ">
                                <div class="form-row">
                                    <div class="col-md-6  ">
                                        <div class="scope-input">
                                            <input type="text" class="form-control scopvalue" id="scopecategory"
                                                placeholder="Create Profile" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="scope-input">
                                            <select class="form-control slectable-options" id="scopeid" required>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button"
                                    class="btn mb-2 btn-sm btn-secondary"data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn mb-2 btn-sm btn-primary updateProfile" id="scopUpdate">Update</button>
                                <button type="button" class="btn mb-2 btn-sm btn-danger deleteProfile" id="scopDelete">Delete</button>
                            </div> --}}