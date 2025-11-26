<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Hospital System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/master.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/flagiconcss/css/flag-icon.min.css') }}" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @livewireStyles
    <style>
        .card-header {
            background-color: #0056b3 !important;
            color: #ffffff !important;
        }
        .btn-dark, .bg-dark {
            background-color: #004494 !important;
            border-color: #004494 !important;
            color: white !important;
        }
        
        .btn-dark:hover {
            background-color: #003366 !important;
        }
        .table thead th {
            background-color: #0056b3;
            color: #ffffff;
            border-color: #0056b3;
        }
        .sidebar-link.active {
            color: #0056b3 !important;
            border-left: 3px solid #0056b3 !important;
        }
    </style>
</head>

<body class="clinic_version">
    <div class="wrapper">
        <nav id="sidebar" class="active mt-4">
            <ul class="mt-5 list-unstyled components text-secondary">
                <li>
                    <a href="{{ route('admin_dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
                </li>
                <li> 
                    <a href="{{ route('employees') }}"><i class="fas fa-user-md"></i> Employees & Doctors</a>
                </li>
                <li>
                    <a href="{{ route('admin_patients') }}"><i class="fas fa-procedures"></i> Patients</a>
                </li>
                <li>
                    <a href="{{ route('blocks') }}"><i class="fas fa-building"></i> Blocks</a>
                </li>
                <li>
                    <a href="{{ route('departments') }}"><i class="fas fa-clinic-medical"></i> Departments</a>
                </li>
                <li>
                    <a href="{{ route('Rooms') }}"><i class="fas fa-door-open"></i> Rooms</a>
                </li>
                <li>
                    <a href="{{ route('patients_beds') }}"><i class="fas fa-bed"></i> Beds Allocation</a>
                </li>
                <li>
                    <a href="{{ route('appointment') }}"><i class="fas fa-calendar-check"></i> Appointments</a>
                </li>
                <li>
                    <a href="{{ route('requestedAppointment') }}"><i class="fas fa-calendar-plus"></i> Appointment Requests</a>
                </li>
                <li>
                    <a href="{{ route('patient_bills') }}"><i class="fas fa-file-invoice-dollar"></i> Bills</a>
                </li>
            </ul>
        </nav>

        <div id="body" class="active">
            <nav class="navbar navbar-expand-lg fixed-top navbar-white bg-white">
                <button type="button" id="sidebarCollapse" class="btn btn-light">
                    <i class="fas fa-bars"></i><span></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <div class="nav-dropdown">
                                <a href="" class="nav-item nav-link dropdown-toggle text-secondary" data-toggle="dropdown">
                                    <i class="fas fa-user"></i>
                                    <span>{{ auth()->user()->name ?? 'Admin' }}</span> 
                                    <i style="font-size: .8em;" class="fas fa-caret-down"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right nav-link-menu">
                                    <ul class="nav-list">
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button type="submit" class="dropdown-item logout-button">
                                                    <i class="fas fa-sign-out-alt"></i> Logout
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="content">
                <div class="container">
                    <br><br><br>

                    {{ $slot }}

                    @yield('admin_content')
                    
                    @livewireScripts
                    <script src="{{ asset('js/livewire-turbolinks.js') }}"></script>
                    <script src="{{ asset('js/alpine.js') }}"></script>
                    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
                    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
                    <script src="{{ asset('assets/js/script.js') }}"></script>
                </div>
            </div>
        </div>
    </div>
</body>
</html>