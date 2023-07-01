<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>
        @yield('title')
    </title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/simplebar.css') }}">
    <!-- Fonts CSS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/uppy.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.steps.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/quill.snow.css') }}">
    {{-- Data Tables --}}
    <link rel="stylesheet"href="{{ asset('assets/css/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.css') }}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.css') }}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/app-light.css') }}" id="lightTheme">
    <link rel="stylesheet" href="{{ asset('assets/css/app-dark.css') }}" id="darkTheme" disabled>
    {{-- Font Awsome --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />

  <style>
        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #ffffff;
            background-color: #1b68ff !important;
        }
    </style>
</head>

<body class="vertical  light">
    <div class="wrapper">

        <nav class="topnav navbar navbar-light" style="margin-left: 0px;">

            {{-- <nav class="topnav navbar navbar-light"> --}}
            {{-- <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
                <i class="fe fe-menu navbar-toggler-icon"></i>
            </button> --}}
            <form class="form-inline mr-auto">
                {{-- <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search" placeholder="Type something..." aria-label="Search"> --}}
            </form>
            <ul class="nav ">
                <li class="nav-item">
                    <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
                        <i class="fe fe-sun fe-16"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-muted my-2 dropdown-toggle text-muted pr-0" href="#"
                        id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        Quick Access
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('checkin') }}">Visitor Kiosk</a>
                        <a class="dropdown-item" href="{{ route('visitortimeline') }}">Visitor Timeline</a>
                        <a class="dropdown-item" href="{{ route('reasonvisits') }}">Reason for Visits</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    @if ($loggedUser)
                        <a class="nav-link text-muted my-2 dropdown-toggle text-muted pr-0" href="#"
                            id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            {{ $loggedUser->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Register</a>
                            <a class="dropdown-item" href="{{ route('auth.logout') }}">Logout</a>
                        </div>
                    @endauth
            </li>
        </ul>
    </nav>
    <main role="main" class="main-content" style="margin-left: 0rem">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8 mb-1">
                    <div class="card shadow">
                        <div class="card-body">
                            <ul class="nav nav-pills nav-fill">
                                <li class="nav-item">

                                    <a class="nav-link active" data-toggle="pill"
                                        href="{{ route('checkin') }}">Check In</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('checkout') }}">Check Out</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <form action="{{ route('checkin.store') }}" method="post" class="needs-validation"
                        novalidate>
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card shadow mb-3">
                                    <div class="card-header">
                                        <strong class="card-title">Please fill the form for Check-In
                                        </strong>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3 ">
                                                <label for="validationCustom01">First Name</label>
                                                <input type="text" class="form-control @error('first_name') is-invalid @enderror " value="{{ old('first_name') }}"
                                                    id="validationCustom01"name="first_name"
                                                    placeholder="First Name" required>
                                                    <span class="text-danger">@error('first_name'){{ $message }} @enderror</span>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom02">Last Name</label>
                                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" id="validationCustom02"
                                                    name="last_name" placeholder="Last Name" required>
                                                    <span class="text-danger">@error('last_name'){{ $message }} @enderror</span>
                                                </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom03">Reason For Visit</label>
                                                <select class="form-control @error('reason_for_visit') is-invalid @enderror"  id="validationCustom003"
                                                    name="reason_for_visit" required>
                                                    <option selected disabled value="">Choose...</option>
                                                    @foreach ($reasonvisits as $reason)
                                                        <option value="{{ $reason->id }}" {{(old('reason_for_visit')==$reason->id)? 'selected':''}}>
                                                            {{ $reason->purpose }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">@error('reason_for_visit'){{ $message }} @enderror</span>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom04">Visitor From</label>
                                                <input type="text" class="form-control @error('visitor_from') is-invalid @enderror" value="{{ old('visitor_from') }}" id="validationCustom04"
                                                    name="visitor_from" placeholder="Visitor From" required>
                                                    <span class="text-danger">@error('visitor_from'){{ $message }} @enderror</span>
                                                </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom05">Date of Check-in</label>
                                                <input type="date" class="form-control @error('date_check_in') is-invalid @enderror"  id="validationCustom05"
                                                    value="{{ now()->toDateString('Y-m-d') }}"
                                                    name="date_check_in" readonly required>
                                                    <span class="text-danger">@error('date_check_in'){{ $message }} @enderror</span>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom06">Time of Check-in</label>
                                                <input type="text" class="form-control @error('time_check_in') is-invalid @enderror"  value="{{ old('time_check_in') }}" id="myTextbox"
                                                    name="time_check_in" value=""
                                                    readonly required>
                                                    <span class="text-danger">@error('time_check_in'){{ $message }} @enderror</span>
                                            </div>
                                        </div> <!-- /.form-row -->
                                        <div class="mb-2">
                                            <button type="submit" class="btn mb-2 btn-primary btn-md btn-block">Save</button>
                                        </div>
                                    </div> <!-- /.card-body -->
                                </div> <!-- /.card -->
                            </div> <!-- /.col -->
                        </div> <!-- /. end-section -->
                    </form>
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->

    </main> <!-- main -->
</div> <!-- .wrapper -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/js/daterangepicker.js') }}"></script>
<script src="{{ asset('assets/js/jquery.stickOnScroll.js') }}"></script>
<script src="{{ asset('assets/js/tinycolor-min.js') }}"></script>
<script src="{{ asset('assets/js/config.js') }}"></script>
<script src="{{ asset('assets/js/d3.min.js') }}"></script>
<script src="{{ asset('assets/js/topojson.min.js') }}"></script>
<script src="{{ asset('assets/js/datamaps.all.min.js') }}"></script>
<script src="{{ asset('assets/js/datamaps-zoomto.js') }}"></script>
<script src="{{ asset('assets/js/datamaps.custom.js') }}"></script>
<script src="{{ asset('assets/js/Chart.min.js') }}"></script>
{{-- Data Tables --}}
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>

<script>
    /* defind global options */
    Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
    Chart.defaults.global.defaultFontColor = colors.mutedColor;
</script>
<script src="{{ asset('assets/js/gauge.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('assets/js/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/js/apexcharts.custom.js') }}"></script>
<script src="{{ asset('assets/js/jquery.mask.min.js') }}"></script>
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.steps.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.timepicker.js') }}"></script>
<script src="{{ asset('assets/js/dropzone.min.js') }}"></script>
<script src="{{ asset('assets/js/uppy.min.js') }}"></script>
<script src="{{ asset('assets/js/quill.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>

<script>
    $(document).ready(function() {
        toastr.options.timeOut = 3000;
        @if (Session::has('error'))
            toastr.error('{{ Session::get('error') }}');
        @elseif(Session::has('success'))
            toastr.success('{{ Session::get('success') }}');
        @endif
    });
  
  </script>

<script>
    $(document).ready(function() {
        var time = new Date().toLocaleTimeString();
        var cTime = time;
        $("#myTextbox").val(cTime);

        setInterval(function() {
            var time = new Date().toLocaleTimeString();
            var currentValue = $("#myTextbox").val();
            $("#myTextbox").val(time);
            // $("#myTextbox").val(currentValue + "\n" + time);
            // $("time").text(time);
        }, 1000);
    });
</script>
<script>
    $('.select2').select2({
        theme: 'bootstrap4',
    });
  
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
<script>
    var uptarg = document.getElementById('drag-drop-area');
    if (uptarg) {
        var uppy = Uppy.Core().use(Uppy.Dashboard, {
            inline: true,
            target: uptarg,
            proudlyDisplayPoweredByUppy: false,
            theme: 'dark',
            width: 770,
            height: 210,
            plugins: ['Webcam']
        }).use(Uppy.Tus, {
            endpoint: 'https://master.tus.io/files/'
        });
        uppy.on('complete', (result) => {
            console.log('Upload complete! We’ve uploaded these files:', result.successful)
        });
    }
</script>
<script src="{{ asset('assets/js/apps.js') }}"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-56159088-1');
</script>


</body>

</html>
