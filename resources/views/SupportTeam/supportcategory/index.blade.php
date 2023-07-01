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
                                <strong class="card-title">Support Profile </strong>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-5 mb-3 ">
                                        <div class="scope-input" id="categoryform">
                                            <input type="text" class="form-control" id="category" name="category"  value="{{ old('category') }}"
                                                placeholder="Create Profile" required>
                                                <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 mb-3">
                                        <div class="scope-input" id="scopform">
                                            <select class="form-control" id="scope_id" name="scope_id" required>
                                                <option selected disabled value="">Choose...</option>
                                                @foreach ($support_scop as $key => $datas)
                                                    <option value="{{ $datas->id }}"  {{(old('scope_id')==$datas->id)? 'selected':''}}>{{ $datas->scope_name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-3 ">
                                        <div class="pull-right" data-toggle="modal">
                                            <button class="btn btn-success" id="addNewCategory"> Save </button>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-4 text-center" id="supportCategory">
                                    </div>
                                </div>
                            </div> <!-- /.form-row -->
                        </div>
                    </div>

                    <div class="col-md-6 showsupportprofile">
                        <div class="card shadow">
                            <div class="card-header">
                                <strong class="card-title">Support Sub Profile </strong>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-10 mb-3 ">
                                        <div class="scope-input" id="subcategoryform"> 
                                            <input type="text" class="form-control" id="sub_category" name="sub_category"
                                                placeholder="Create Sub Profile" required>
                                                <div class="invalid-feedback"></div>

                                        </div>
                                        <input type="hidden" class="subcategory" id="subcategory_id">
                                    </div>
                                    <div class="col-md-2 mb-3 ">
                                        <div class="pull-right" data-toggle="modal">
                                            <button class="btn btn-success" id="addNewSubScop"> Save </button>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-4" id="subcategoryData">
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
                            <h5 class="modal-title" id="varyModalLabel">Edit Support Profile</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="col-md-12">
                            <div class="card-body ">
                                <div class="form-row">
                                    <div class="col-md-6  mb-2">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .container-fluid -->
    @endsection

    @section('scripts')
        <script>
            $(document).ready(function() {
                fetch_data();
                function fetch_data() {
                    $.ajax({
                        type: 'post',
                        url: "{{ route('supportcategory.data') }}",
                        data: {
                            '_token': "{{ csrf_token() }}",
                        },
                        success: function(response) {
                            $('#supportCategory').html('');
                            console.log(response.data);
                            // if (response.data.length > 0) {
                                $.each(response.data, function(key, value) {
                                    $("#supportCategory").append(
                                        '<div class="form-row align-items-center  "><div class="col addscope subCategory" data-id=' +
                                        value.id + '> <b  >' + value.category +
                                        '</b></div><span class="circle circle-sm addscope" id="editSupportCategory"  data-id=' +
                                        value.id + ' ><i class="fe fe-edit"></i></span></div>'
                                    );
                                });
                            // } else {
                            //     $("#supportCategory").append("Data Not Found");
                            // }
                        },
                        error: function(response) {
                            console.log(response);
                        }
                    });
                }

                //  Add New Support 
                $(document).on("click", "#addNewCategory", function() {
                    var category = $('#category').val();
                    var scope_id = $('#scope_id :selected').val();
                    // if (category != '' || scope_id != '') {
                        $.ajax({
                            type: 'post',
                            url: "{{ route('supportcategory.store') }}",
                            data: {
                                category: category,
                                scope_id: scope_id
                            },
                            success: function(response) {
                                if(response.status == 400){
                                showError('category', response.message.category);
                                showError('scope_id', response.message.scope_id);
                            }else if(response.status == 200){
                                fetch_data();
                                $('#category').val('');
                                $('#scope_id').val('');
                                removeValidtionClasses("#categoryform");
                                removeValidtionClasses("#scopform");
                            }
                              
                            }
                        });
                    // } else {
                    //     alert("Please Enter The Data")
                    // }
                });


                $(document).on('click', '.subCategory', function() {
                    var id = $(this).attr("data-id");
                    $(".subcategory").html(id);
                    let url = '{{ route('supportsubcategory.show') }}'
                    $.ajax({
                        url: url + '/' + id,
                        method: 'get',
                        data: {
                            id: id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            $('#subcategoryData').html('');
                            $('.showsupportprofile').show()
                            // if (response.data.length > 0) {
                                $.each(response.data, function(key, value) {
                                    $("#subcategoryData").append(
                                        '<div class="form-row align-items-center"><div class=" col-md-10 " data-id=' +
                                        value.id + '><strong> ' + value.sub_category +
                                        '</strong></div> <div class="col-md-2 subDelete" data-id=' +
                                        value.id +
                                        '><span style="cursor: pointer"><i class="fe fe-18 fe-trash-2"></i></span></div> <hr class="my-4"></div>'
                                    );
                                });
                                $('#sub_category').val('');
                                $('#subcategory_id').val('');
                                removeValidtionClasses("#categoryform");
                                removeValidtionClasses("#scopform");
                            // } else {
                            //     $("#subcategoryData").append("Data Not Found");
                            // }  
                        }
                    });
                });

                $(document).on("click", "#addNewSubScop", function() {
                    var sub_category = $('#sub_category').val();
                    var supportcategory_id = $('#subcategory_id').text();
                    // if (sub_category != '') {
                        $.ajax({
                            type: 'post',
                            url: "{{ route('supportsubcategory.store') }}",
                            data: {
                                sub_category: sub_category,
                                supportcategory_id: supportcategory_id
                            },
                            success: function(response) {
                                if(response.status == 400){
                                showError('sub_category', response.message.sub_category);
                            }else if(response.status == 200){ 2
                                $("#subcategoryData").append(
                                    '<div class="form-row"><div class=" col-md-10  " data-id=' +
                                    response.data.id + '><strong> ' + response.data
                                    .sub_category +
                                    '</strong></div> <div class="col-md-2 subDelete" data-id=' +
                                    response.data.id +
                                    '><span style="cursor: pointer"><i class="fe fe-18 fe-trash-2"></i><span></span></div><hr class="my-4"></div>'
                                );
                                $('#sub_category').val('');
                                $('#subcategory_id').val('');
                                removeValidtionClasses("#subcategoryform");
                                }
                            }
                        });
                    // } else {
                    //     alert("Please Enter The Data")
                    // }
                });

                $(document).on('click', '.subDelete', function() {
                    var btn = $(this);
                    btn.prop('disabled', true);
                    var id = $(this).attr("data-id");
                    let parentDiv = $(this).closest('.form-row');
                    let url = '{{ route('supportsubcategory.delete') }}'
                    // if (confirm("Are you sure you want to delete this item?")) {
                        btn.html('<i class="fas fa-spinner fa-spin"></i>');
                        $.ajax({
                            url: url + '/' + id,
                            method: 'delete',
                            data: {
                                id: id,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                if (response) {
                                    $(parentDiv).remove();
                                }
                            },
                            error: function(response) {
                                console.log(response);
                            },
                        });
                    // }
                });

                //Edit Support Category
                $(document).on("click", "#editSupportCategory", function() {
                    var id = $(this).attr("data-id");
                    let url = '{{ route('editsupportcategory.edit') }}'
                    $.ajax({
                        url: url + '/' + id,
                        method: 'get',
                        data: {
                            id: id, 
                        },
                        success: function(response) {
                            $('#scopecategory').val(response.data.category);
                            $('#scopUpdate').val(response.data.id);
                            $('#scopDelete').val(response.data.id);
                            // $('.slectable-options').html();
                            let options = "";
                            options += `<option selected disabled value="">Choose...</option>`;
                            $.each(response.support_scop, function(key, value) {
                                let selected = response.data.scope_id === value.id ? 'selected' : '';
                                // $('.slectable-options').append(`<option value="${value.id}" ${selected}>${value.scope_name}</option>`)
                                options +=
                                    `<option   value="${value.id}" ${selected}>${value.scope_name}</option>`;
                            });
                            $('.slectable-options').html(options);
                            $("#myModal").modal("show");
                            removeValidtionClasses("#categoryform");
                             removeValidtionClasses("#scopform");
                            // $("#myModal .modalbody").html(response)
                        }
                    });
                });

                $(document).on("click", ".updateProfile", function() {
                    var id =  $('#scopUpdate').val();
                    var category = $('#scopecategory').val();
                    var scope_id = $('#scopeid :selected').val();
                    let url = '{{ route('updatesupportcategory.update') }}';
                    $.ajax({
                        url: url + '/' + id,
                        method: 'post',
                        data: {
                            category: category,
                            scope_id: scope_id
                        },
                        success: function(response) {
                            console.log(response);
                            fetch_data();
                            $("#myModal").modal("hide");

                        },
                        error: function(response) {
                            $("#myModal").modal("hide");
                            //  console.log('#myModal');
                        }
                    });

                });

                $(document).on("click", ".deleteProfile", function() {
                    var id =  $('#scopDelete').val();
                    let url = '{{ route('deletesupportcategory.delete') }}';
                    $.ajax({
                        url: url + '/' + id,
                        method: 'delete',
                        data: {
                            id: id,
                        },
                        success: function(response) {
                            $("#myModal").modal("hide");
                            $('.showsupportprofile').hide()
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
    @endsection
