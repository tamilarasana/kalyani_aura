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
      {{-- @if ($userrole->open_dashboard == 'Yes') --}}
            <nav class="topnav navbar navbar-light">
            {{-- @else --}}
                {{-- <nav class="topnav navbar navbar-light" style="margin-left: 0px;"> --}}
        {{-- @endif --}}
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
              <a class="dropdown-item" target="_blank"    href="{{ route('checkin') }}">Visitor Kiosk</a>
              <a class="dropdown-item"  target="_blank"   href="{{ route('visitortimeline') }}">Visitor Timeline</a>
              <a class="dropdown-item"   target="_blank"  href="{{ route('reasonvisits') }}">Reason for Visits</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            @if($loggedUser)
            <a class="nav-link text-muted my-2 dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{$loggedUser->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              {{-- <a class="dropdown-item"  href="#">Register</a> --}}
              <a class="dropdown-item" href="{{ route('auth.logout') }}">Logout</a>
            </div>
            @endauth
          </li>
        </ul>
      </nav>
      {{-- @if ($userrole->open_dashboard == 'Yes') --}}
      <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
          <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>
        <nav class="vertnav navbar navbar-light">
          <!-- nav bar -->
          <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{ route('dashbord') }}">
              <img src="{{ asset('assets/images/LOGO BLACK.png')}}" width="30%" alt="Img">
            </a>
          </div>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100 ">
              <a href="#"  class=" nav-link">
                <i class="fe fe-home fe-16"></i>
                <span class="ml-3 item-text">Dashboard</span>
              </a>
            </li>
          </ul>
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>GENERAL</span>
          </p>
              <ul class="navbar-nav flex-fill w-100 mb-2">
                  <li class="nav-item w-100 ">
                    <a class="nav-link  {{ Request::is('managelocations') || Request::is('managelocations/*') ? 'active' : ''}}" href="{{ route('managelocations.index') }}">
                      {{-- <i class="fa-solid fa-location-dot"></i> --}}
                      <i class="fe fe-map-pin fe-16"></i>
                      <span class="ml-3 item-text">Manage Location</span>
                    </a>
                  </li>
                  <li class="nav-item w-100 ">
                    <a class="nav-link  {{ Request::is('manageinventories') || Request::is('manageinventories/*') ? 'active' : ''}}" href="{{ route('manageinventories.index') }}">
                      {{-- <i class="fa-regular fa-file"></i> --}}
                      <i class="fe fe-file fe-16"></i>
                      <span class="ml-3 item-text">Manage Inventory</span>
                    </a>
                  </li>
                  <li class="nav-item w-100 ">
                    <a class="nav-link {{ Request::is('manageplan') || Request::is('manageplan/*') ? 'active' : ''}} " href="{{ route('manageplan.index') }}">
                      {{-- <i class="fa-solid fa-layer-group"></i> --}}
                      <i class="fe fe-layers fe-16"></i>
                      <span class="ml-3 item-text">Manage Plan</span>
                    </a>
                  </li>
              </ul>
            <p class="text-muted nav-heading  mb-1">
              <span>COMMUNITY</span>
            </p>
            <ul class="navbar-nav flex-fill w-100 mb-2">
              <li class="nav-item w-100">
                <a class="nav-link {{ Request::is('managecompany') || Request::is('managecompany/*') ? 'active' : ''}} " href="{{ route('managecompany.index') }}">
                  <span class="fe fe-16 fe-trello "></span> 
                  <span class="ml-3 item-text">Manage Companies</span>
                </a>
              </li>
                <li class="nav-item w-100">
                  <a class="nav-link {{ Request::is('managemember') || Request::is('managemember/*') ? 'active' : ''}} " href="{{ route('managemember.index') }}">
                    {{-- <i class="fa-solid fa-people-group"></i> --}}
                    <i class="fe fe-users fe-16"></i>
                    <span class="ml-3 item-text">Manage Members</span>
                  </a>
                </li>
                
              </ul>
             {{-- Support Team Start --}}
          <p class="text-muted nav-heading mb-1">
            <span>SUPPORT TEAM</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">

            <li class="nav-item w-100">
              <a class="nav-link {{ Request::is('supportscop') || Request::is('supportscop/*') ? 'active' : ''}} " href="{{ route('supportscop.index') }}">
                <i class="fe fe-16 fe-headphones"></i>
                <span class="ml-3 item-text">Support Scope</span>
              </a>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link {{ Request::is('supportcategory') || Request::is('supportcategory/*') ? 'active' : ''}} " href="{{ route('supportcategory.index') }}">
                <i class="fe fe-file-plus fe-16"></i>
                {{-- <i class="fa-solid fa-file-lines"></i> --}}
                <span class="ml-3 item-text">Support Profile</span>
              </a>
            </li> 
            <li class="nav-item w-100">
              <a class="nav-link {{ Request::is('manageteam') || Request::is('manageteam/*') ? 'active' : ''}} " href="{{ route('manageteam.index') }}">
                <i class="fa-solid fa-people-group"></i>
                <span class="ml-3 item-text">Manage Team</span>
              </a>
            </li>
            
           
            <li class="nav-item w-100">
              <a class="nav-link {{ Request::is('supportticket') || Request::is('supportticket/*') ? 'active' : ''}} " href="{{ route('supportticket.index') }}">
                <i class="fa-regular fa-address-card"></i>  
                <span class="ml-3 item-text">Support Tickets</span>
              </a>
            </li>
          </ul>
          <p class="text-muted nav-heading  mb-1">
            <span>SOCIAL ENGAGEMENT</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
              <a class="nav-link {{ Request::is('announcement') || Request::is('announcement/*') ? 'active' : ''}} " href="{{ route('announcement.index') }}">
                <i class="fa-solid fa-volume-high"></i>
                <span class="ml-3 item-text">Announcements</span>
              </a>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link" href="#">
                <i class="fe fe-16 fe-gift"></i>
                <span class="ml-3 item-text">Alliances</span>
              </a>
            </li>        
          </ul>
          <p class="text-muted nav-heading  mb-1">
            <span>VISITOR MANAGEMENT</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2"> 
            <li class="nav-item w-100">
                <a class="nav-link {{ Request::is('visitor') || Request::is('visitor/*') ? 'active' : ''}} " href="{{ route('visitor.index') }}">
                <i class="fa-solid fa-puzzle-piece"></i>
                <span class="ml-3 item-text">Visitor Log</span>
              </a>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link {{ Request::is('manageuser') || Request::is('manageuser/*') ? 'active' : ''}} " href="{{ route('manageuser.index') }}">
                <i class="fa-solid fa-user-shield"></i>
                <span class="ml-3 item-text">Users</span>
              </a>
            </li>
          </ul>
          <p class="text-muted nav-heading  mb-1">
            <span>SETTINGS</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
         <li class="nav-item w-100">
              <a class="nav-link" href="#">
                <i class="fe fe-calendar fe-16"></i>
                <span class="ml-3 item-text">Integration</span>
              </a>
            </li>
         <li class="nav-item w-100">
              <a class="nav-link" href="#">
                <i class="fe fe-16 fe-file-minus"></i>
                <span class="ml-3 item-text">Documents</span>
              </a>
            </li>
         <li class="nav-item w-100">
              <a class="nav-link" href="#">
                <i class="fe fe-16 fe-file-text"></i>
                <span class="ml-3 item-text">Billing Settings</span>
              </a>
            </li>
         <li class="nav-item w-100">
              <a class="nav-link" href="#">
                <i class="fa-regular fa-message"></i>
                <span class="ml-3 item-text">Support</span>
              </a>
            </li>
          </ul>
        </nav>
      </aside>

      {{-- @else
      <div class="col-md-6">
          <h2>Permission Denied</h2>
          <p>Sorry, you don't have permission to access the page.</p>
      </div> --}}
  {{-- @endif --}}
      <main role="main" class="main-content">
        @yield('content')
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
    <script src="{{ asset('assets/js/function.js')}}"></script>
    {{-- Data Tables --}}
    <script src="{{ asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
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
    	@yield('scripts')

  </body>
</html>