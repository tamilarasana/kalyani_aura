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
    <link rel="stylesheet" href="{{ asset('assets/css/simplebar.css')}}">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/select2.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/dropzone.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/uppy.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.steps.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.timepicker.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/quill.snow.css')}}">
    {{-- Data Tables --}}
    <link rel="stylesheet"href="{{ asset('assets/css/feather.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.css')}}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.css')}}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/app-light.css')}}" id="lightTheme">
    <link rel="stylesheet" href="{{ asset('assets/css/app-dark.css')}}" id="darkTheme" disabled>
      {{-- Font Awsome --}}
      <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js"></script>      
      <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />
 
    </head>
  <body class="vertical  light">
    <div class="wrapper">
    
         <nav class="topnav navbar navbar-light" style="margin-left: 0px;">
      
      {{-- <nav class="topnav navbar navbar-light"> --}}
        <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
          <i class="fe fe-menu navbar-toggler-icon"></i>
        </button>
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
            <a class="nav-link text-muted my-2 dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Quick Access
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item"  href="{{ route('checkin') }}">Visitor Kiosk</a>
              <a class="dropdown-item"  href="{{ route('visitortimeline') }}">Visitor Timeline</a>
              <a class="dropdown-item"  href="{{ route('reasonvisits') }}">Reason for Visits</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            @if($loggedUser)
            <a class="nav-link text-muted my-2 dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{$loggedUser->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item"  href="#">Register</a>
              <a class="dropdown-item" href="{{ route('auth.logout') }}">Logout</a>
            </div>
            @endauth
          </li>
        </ul>
      </nav>
      <main role="main" class="main-content" style="margin-left: 0rem">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row align-items-center ">
                    <div class=" col-md-12">
                        <h2 class="h5 page-title">Add Reasons for Visit</h2>
                    </div>
                    <div class="col-auto">
                        <div class="float-right">
                            <form action="{{route('reasonvisitor.store')}}" method = "post" class="needs-validation" novalidate>
                                {{csrf_field()}}
                                <div class="form-row">
                                    <div class=" col-auto">
                                        <input type="text" class="form-control  @error('purpose') is-invalid @enderror" id="validationCustom3" name="purpose"  placeholder="Reason Name" required>
                                        {{-- <span class="text-danger">@error('purpose'){{ $message }} @enderror</span> --}}
                                      </div>
                                    <div class=" col-auto">
                                        <button type="submit" class="btn btn-success ">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="pull-right">
                      <a class="btn btn-secondary" href="{{ route('visitor.index') }}"> Back </a>
                  </div>
                        
                          
                </div>
                <div class="row my-2">
                    <!-- Small table -->
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <table class="table datatables" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th>Reason For Visit</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @if (count($reasonvisit) > 0) --}}
                                        @foreach ($reasonvisit as $visitorreason)
                                            <tr>
                                                <td>{{ $visitorreason->purpose }}</td>
                                                <td><a  href="{{ route('visitoreasonr.destroy', ['id' => $visitorreason->id]) }}" class="small text-muted" >Remove</a>
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
</main> <!-- main -->
</div> <!-- .wrapper -->
<script src="{{ asset('assets/js/jquery.min.js')}}"></script>
<script src="{{ asset('assets/js/popper.min.js')}}"></script>
<script src="{{ asset('assets/js/moment.min.js')}}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/js/simplebar.min.js')}}"></script>
<script src="{{ asset('assets/js/daterangepicker.js')}}"></script>
<script src="{{ asset('assets/js/jquery.stickOnScroll.js')}}"></script>
<script src="{{ asset('assets/js/tinycolor-min.js')}}"></script>
<script src="{{ asset('assets/js/config.js')}}"></script>
<script src="{{ asset('assets/js/d3.min.js')}}"></script>
<script src="{{ asset('assets/js/topojson.min.js')}}"></script>
<script src="{{ asset('assets/js/datamaps.all.min.js')}}"></script>
<script src="{{ asset('assets/js/datamaps-zoomto.js')}}"></script>
<script src="{{ asset('assets/js/datamaps.custom.js')}}"></script>
<script src="{{ asset('assets/js/Chart.min.js')}}"></script>
{{-- Data Tables --}}
<script src="{{ asset('assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
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
  $('#dataTable-1').DataTable(
  {
    autoWidth: true,
    "lengthMenu": [
      [10, 20, 40, -1],
      [10, 20, 40, "All"]
    ]
  });
</script>
<script>
  $('#dataTable1').DataTable(
  {
    autoWidth: true,
    "lengthMenu": [
      [10, 20, 40, -1],
      [10, 20, 40, "All"]
    ]
  });
</script>
   <script>
    $('#dataTableModel').DataTable(
    {
      autoWidth: true,
      "lengthMenu": [
        [5, 8, 10, -1],
        [10, 10, 20, "All"]
      ]
    });
  </script>
<script>
  /* defind global options */
  Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
  Chart.defaults.global.defaultFontColor = colors.mutedColor;
</script>
<script src="{{ asset('assets/js/gauge.min.js')}}"></script>
<script src="{{ asset('assets/js/jquery.sparkline.min.js')}}"></script>
<script src="{{ asset('assets/js/apexcharts.min.js')}}"></script>
<script src="{{ asset('assets/js/apexcharts.custom.js')}}"></script>
<script src="{{ asset('assets/js/jquery.mask.min.js')}}"></script>
<script src="{{ asset('assets/js/select2.min.js')}}"></script>
<script src="{{ asset('assets/js/jquery.steps.min.js')}}"></script>
<script src="{{ asset('assets/js/jquery.validate.min.js')}}"></script>
<script src="{{ asset('assets/js/jquery.timepicker.js')}}"></script>
<script src="{{ asset('assets/js/dropzone.min.js')}}"></script>
<script src="{{ asset('assets/js/uppy.min.js')}}"></script>
<script src="{{ asset('assets/js/quill.min.js')}}"></script>

<script>
  $('.select2').select2(
  {
    theme: 'bootstrap4',
  });
  $('.select2-multi').select2(
  {
    multiple: true,
    theme: 'bootstrap4',
  });
  $('.drgpicker').daterangepicker(
  {
    singleDatePicker: true,
    timePicker: false,
    showDropdowns: true,
    locale:
    {
      format: 'MM/DD/YYYY'
    }
  });
  $('.time-input').timepicker(
  {
    'scrollDefault': 'now',
    'zindex': '9999' /* fix modal open */
  });
  
  /** date range picker */
  if ($('.datetimes').length)
  {
    $('.datetimes').daterangepicker(
    {
      timePicker: true,
      startDate: moment().startOf('hour'),
      endDate: moment().startOf('hour').add(32, 'hour'),
      locale:
      {
        format: 'M/DD hh:mm A'
      }
    });
  }
  var start = moment().subtract(29, 'days');
  var end = moment();

  function cb(start, end)
  {
    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
  }
  $('#reportrange').daterangepicker(
  {
    startDate: start,
    endDate: end,
    ranges:
    {
      'Today': [moment(), moment()],
      'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Last 7 Days': [moment().subtract(6, 'days'), moment()],
      'Last 30 Days': [moment().subtract(29, 'days'), moment()],
      'This Month': [moment().startOf('month'), moment().endOf('month')],
      'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    }
  }, cb);
  cb(start, end);
  $('.input-placeholder').mask("00/00/0000",
  {
    placeholder: "__/__/____"
  });
  $('.input-zip').mask('00000-000',
  {
    placeholder: "____-___"
  });
  $('.input-money').mask("#.##0,00",
  {
    reverse: true
  });
  $('.input-phoneus').mask('(000) 000-0000');
  $('.input-mixed').mask('AAA 000-S0S');
  $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ',
  {
    translation:
    {
      'Z':
      {
        pattern: /[0-9]/,
        optional: true
      }
    },
    placeholder: "___.___.___.___"
  });
  // editor
  var editor = document.getElementById('editor');
  if (editor)
  {
    var toolbarOptions = [
      [
      {
        'font': []
      }],
      [
      {
        'header': [1, 2, 3, 4, 5, 6, false]
      }],
      ['bold', 'italic', 'underline', 'strike'],
      ['blockquote', 'code-block'],
      [
      {
        'header': 1
      },
      {
        'header': 2
      }],
      [
      {
        'list': 'ordered'
      },
      {
        'list': 'bullet'
      }],
      [
      {
        'script': 'sub'
      },
      {
        'script': 'super'
      }],
      [
      {
        'indent': '-1'
      },
      {
        'indent': '+1'
      }], // outdent/indent
      [
      {
        'direction': 'rtl'
      }], // text direction
      [
      {
        'color': []
      },
      {
        'background': []
      }], // dropdown with defaults from theme
      [
      {
        'align': []
      }],
      ['clean'] // remove formatting button
    ];
    var quill = new Quill(editor,
    {
      modules:
      {
        toolbar: toolbarOptions
      },
      theme: 'snow'
    });
  }
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function()
  {
    'use strict';
    window.addEventListener('load', function()
    {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form)
      {
        form.addEventListener('submit', function(event)
        {
          if (form.checkValidity() === false)
          {
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
  if (uptarg)
  {
    var uppy = Uppy.Core().use(Uppy.Dashboard,
    {
      inline: true,
      target: uptarg,
      proudlyDisplayPoweredByUppy: false,
      theme: 'dark',
      width: 770,
      height: 210,
      plugins: ['Webcam']
    }).use(Uppy.Tus,
    {
      endpoint: 'https://master.tus.io/files/'
    });
    uppy.on('complete', (result) =>
    {
      console.log('Upload complete! We’ve uploaded these files:', result.successful)
    });
  }
</script>
<script src="{{ asset('assets/js/apps.js')}}"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];

  function gtag()
  {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());
  gtag('config', 'UA-56159088-1');
</script>
  

</body>
</html>
