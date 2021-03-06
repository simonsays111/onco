<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

    <!--- sweetalert ---->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

    <!--- bootstrap ---->
    <link rel="stylesheet" href="{{ asset('css/admin-styles/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin-styles/fontawesome/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin-styles/bootstrap.min.css') }}">

    <!--- css ---->
    <link href="{!! asset('css/admin-styles/radio.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/admin-styles/steps.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-styles/pages/calendar.css') }} ">
    
    <link rel="stylesheet" href="{{ asset('css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/frame.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/admin-styles/bootstrap4.4.3.css') }}">
    <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">
    <!--- Table css ---->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> 
  


    <!--- google fonts ---->
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"> @if(Auth::user()) @if ((Auth::user()->isNurse()) or (Auth::user()->isDoctor()) or (Auth::user()->isSecratory()) or (Auth::user()->isAdmin()))

    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-styles/dashboard.css') }} "> @endif @if (Auth::user()->isPatient())
    <link rel="stylesheet" href="{{ asset('css/patients-style/bootstrap4.4.3.css') }}">
    <link rel="stylesheet" href="{{ asset('css/patients-style/frame.css') }}">
    <link href="{!! asset('css/patients-style/steps.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/patients-style/dashboard.css') }} "> @endif @endif
</head>

<body>
    <!---navbar ---->
    <nav class="navbar navbar-expand navbar-dark bg-info">
        <a class="sidebar-toggle text-light mr-3"><i class="fa fa-bars"></i></a>
        <a href="{{ route('dashboard') }}" class="navbar-brand"><img class="logo" src="{{ asset('images/logo.png') }}" alt="ican logo"></a>
        <div class="navbar-collapse collapse">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                        <i class="fa fa-user" alt="username"></i> 
                        @if(Auth::user())
                        {{Auth::user()->name}} 
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!---sidebar---->
    <div class="d-flex align-items-stretch">
        <div class="sidebar bg-dark">
            @if (Auth::user()->isDoctor())
            <ul class="list-unstyled">
                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-tachometer-alt fa-2x " alt="dashboard"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('symptoms.index') }}">
                        <i class="fas fa-heartbeat fa-2x" alt="symptom"></i> Symptoms
                    </a>
                </li>
                <li>
                    <a href="{{ route('treatments.index') }}">
                        <i class="fas fa-stethoscope fa-2x" alt="symptom"></i> Treatments
                    </a>
                </li>
                <li>
                    <a href="{{ route('medications.index') }}">
                        <i class="fas fa-pills fa-2x" alt="medications"></i> Medications
                    </a>
                </li>
                <li>
                    <a href="{{ route('patients.index') }}">
                        <i class="fas fa-user  fa-2x" alt="patients"></i> Patients
                    </a>
                </li>
                <li>
                    <a href="{{ route('slots_time.index') }}">
                        <i class="fas fa-clipboard-list fa-2x"></i> Schedule
                    </a>
                </li>
                <li>
                    <a href="{{ route('appointments.get') }}">
                        <i class="fas fa-calendar-check fa-2x" alt="appointment"></i> Appointments
                    </a>
                </li>
                <li>
                    <a href="{{ route('team.index') }}">
                        <i class="fas fa-user-md fa-2x" alt="team"></i> Medical staff
                    </a>
                </li>
                <li>
                    <a href="{{ route('medicationlogs.index') }}">
                            <i class="fas fa-calendar-check fa-2x" alt="medications log"></i> Medication Log
                        </a>
                </li>
                <li>
                    <a href="{{ route('symtomslog.index') }}">
                            <i class="fas fa-calendar-check fa-2x" alt="symtoms log"></i> Symptom Log
                        </a>
                </li>

            </ul>
            @elseif (Auth::user()->isNurse())
            <ul class="list-unstyled">
                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-tachometer-alt fa-2x " alt="dashboard"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('symptoms.index') }}">
                        <i class="fas fa-heartbeat fa-2x" alt="symptom"></i> Symptoms
                    </a>
                </li>
                <li>
                    <a href="{{ route('treatments.index') }}">
                        <i class="fas fa-stethoscope fa-2x" alt="symptom"></i> Treatments
                    </a>
                </li>
                <li>
                    <a href="{{ route('medications.index') }}">
                        <i class="fas fa-pills fa-2x" alt="medications"></i> Medications
                    </a>
                </li>
                <li>
                    <a href="{{ route('patients.index') }}">
                        <i class="fas fa-user  fa-2x" alt="patients"></i> Patients
                    </a>
                </li>
                <li>
                    <a href="{{ route('team.index') }}">
                        <i class="fas fa-user-md fa-2x" alt="team"></i> Medical staff
                    </a>
                </li>
                <li>
                    <a href="{{ route('appointments.get') }}">
                        <i class="fas fa-calendar-check fa-2x" alt="Appointments"></i> Appointments
                    </a>
                </li>
                <li>
                    <a href="{{ route('symtomslog.index') }}">
                            <i class="fas fa-calendar-check fa-2x" alt="symtoms log"></i> Symptom Log
                        </a>
                </li>
                 <li>
                    <a href="{{ route('medicationlogs.index') }}">
                            <i class="fas fa-calendar-check fa-2x" alt="medications log"></i> Medication Log
                        </a>
                </li>
            </ul>
            @elseif(Auth::user()->isPatient())
            <ul class="list-unstyled">
                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-tachometer-alt fa-2x " alt="dashboard"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('symptopsreports.create') }}">
                        <i class="fas fa-heartbeat fa-2x" alt="medications"></i>Symptoms                    </a>
                </li>
                <li>
                    <a href="{{ route('patients.medicationreports.create') }}">
                        <i class="fas fa-pills fa-2x" alt="medications"></i> Medications
                    </a>
                </li>

                <li>
                    <a href="{{ route('appointments.get') }}">
                        <i class="fas fa-calendar-check fa-2x" alt="appointment"></i> Appointments
                    </a>
                </li>
                

            </ul>
            @elseif(Auth::user()->isSecratory())

            <ul class="list-unstyled">
                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-tachometer-alt fa-2x " alt="dashboard"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('slots_time.index') }}">
                        <i class="fas fa-clipboard-list fa-2x"></i> Schedule
                    </a>
                </li>
                <li>
                    <a href="{{ route('appointments.get') }}">
                        <i class="fas fa-calendar-check fa-2x" alt="appointment"></i> Appointments
                    </a>
                </li>
                <li>
                    <a href="{{ route('patients.index') }}">
                        <i class="fas fa-user  fa-2x" alt="patients"></i> Patients
                    </a>
                </li>
                <li>
                    <a href="{{ route('team.index') }}">
                        <i class="fas fa-user-md fa-2x" alt="team"></i> Medical staff
                    </a>
                </li>
            </ul>
            @elseif(Auth::user()->isAdmin())
            <ul class="list-unstyled">
                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-tachometer-alt fa-2x " alt="dashboard"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('team.index') }}">
                        <i class="fas fa-user-md fa-2x" alt="team"></i> Medical staff
                    </a>
                </li>
                <li>
                    <a href="{{ route('patients.index') }}">
                        <i class="fas fa-user  fa-2x" alt="patients"></i> Patients
                    </a>
                </li>
            </ul>
            @endif
        </div>

        <!---content---->
        <main class="p-4">
            @yield ('content')
        </main>
    </div>
    <!---sidebar ---->
    <footer>

        <!-- FOOTER TOP SECTION START -->

        <div id="page_loader" style="display: none;">
            <i class="fa-li fa fa-spinner fa-spin fa-4x"></i>
        </div>

        <!-- FOOTER BOTTOM SECTION END -->

        <div class="footer-content">© 2018 Ican</div>
    </footer>

    <!---scripts---->
    <script src="{{ asset('js2/jquery.min.js') }}"></script>
    <script src="{{ asset('js2/popper.min.js') }}"></script>
    <script src="{{ asset('js2/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js2/jsframe.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src=" {{ asset('https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js') }}"></script>
    <script src=" {{ asset('https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js') }}"></script>



    <script src=" {{ asset('js2/calendar.js') }}"></script>
    <script src=" {{ asset('js2/new-appointment.js') }}"></script>
    <script type="text/javascript">
        document.title = document.getElementsByTagName("H1").item(0).innerHTML;
    </script>
<!-- datatabel script -->
    <script>
        $(document).ready(function() {
            $('.sidebar-toggle').on('click', function() {
                if ($(window).width() > 479 && $(window).width() < 769) {
                    if ($(".toggled").is(":visible")) {
                        $(".servive-block").css({
                            "height": "280px",
                            "margin-bottom": "12px"
                        });
                    } else {
                        $(".servive-block").css({
                            "height": "250px",
                            "margin-bottom": "250px",
                        });
                    }
                }
            });
            $('#example').dataTable({
                "columnDefs": [{
                    "width": "8%",
                    "targets": 0
                }],
                dom: 'Blfrtip',
                buttons: [
                    'print'
                ],
                responsive: true
            });
            $('#treatments').dataTable({
                "columnDefs": [{
                    "width": "40%",
                    "targets": 4
                }],
                dom: 'Blfrtip',
                buttons: [
                    'print'
                ],
                responsive: true
            });
            $('#example2').dataTable({
                "columnDefs": [{
                    "width": "20%",
                    "targets": 0
                }],
                dom: 'Blfrtip',
                buttons: [
                    'print'
                ],
                responsive: true
            });
            $('#patients').dataTable({
                "columnDefs": [{
                    "width": "30%",
                    "targets": 5
                }],
                dom: 'Blfrtip',
                buttons: [
                    'print'
                ],
                responsive: true
            });
            $('#appointments').dataTable({
                "columnDefs": [{
                    "width": "20%",
                    "targets": 7
                }],
                dom: 'Blfrtip',
                buttons: [
                    'print'
                ],
                responsive: true
            });
            $('#appointments2').dataTable({
                "columnDefs": [{
                    "width": "5%",
                    "targets": 0
                }],
                dom: 'Blfrtip',
                buttons: [
                    'print'
                ],
                responsive: true
            });
            $('#team').dataTable({
                "columnDefs": [{
                    "width": "30%",
                    "targets": 2
                }],
                dom: 'Blfrtip',
                buttons: [
                    'print'
                ],
                responsive: true
            });
            $('#slots').dataTable({
                "columnDefs": [{
                    "width": "10%",
                    "targets": 6
                }],
                dom: 'Blfrtip',
                buttons: [
                    'print'
                ],
                responsive: true

            });
            $('#medication-index').dataTable({
                "columnDefs": [{
                    "width": "30%",
                    "targets": 3
                }],
                dom: 'Blfrtip',
                buttons: [
                    'print'
                ],
                responsive: true

            });
            $('#symptom-index').dataTable({
                "columnDefs": [{
                    "width": "20%",
                    "targets": 3
                }],
                dom: 'Blfrtip',
                buttons: [
                    'print'
                ],
                responsive: true

            });

            $('#symp-report').DataTable({
                dom: 'Blfrtip',
                buttons: [
                    'print'
                ],
                responsive: true
            });
            $('#medicationLog').dataTable({
                "columnDefs": [{
                    "width": "15%",
                    "targets": 0
                }],
                dom: 'Blfrtip',
                buttons: [
                    'print'
                ],
                responsive: true

            });
        });

    </script>
    @include('sweet::alert')
</body>

</html>