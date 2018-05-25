@extends ('layouts.portal')

@section ('content')


    <div class="page-wrapper">
        <div class="page-wrapper-container">
            <h1>Dashboard</h1>

            {{--Doctors dashboard--}}
            @if ((Auth::user()->isNurse()) or (Auth::user()->isDoctor()) )
                {{--Data boxes--}}
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="dash-box dash-box-color-1">
                                <div class="dash-box-icon">
                                    <i class="fas fa-heartbeat"></i>
                                </div>

                                <div class="dash-box-body">
                                    <span class="dash-box-count">0</span>
                                    <span class="dash-box-title">Critical symptom reports</span>
                                </div>

                                <div class="dash-box-action">
                                    <button class="stuff_btn"><a href="#">More Info</a></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="dash-box dash-box-color-2">
                                <div class="dash-box-icon">
                                    <i class="fas fa-pills" aria-hidden="true"></i>
                                </div>
                                <div class="dash-box-body">
                                    <span class="dash-box-count">{{$CriticalCountData or '0'}}</span>
                                    <span class="dash-box-title">Patients in critical condition</span>
                                </div>

                                <div class="dash-box-action">
                                    <button class="stuff_btn"><a href="{{ route('medicationlogs.index') }}">More Info</a></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="dash-box dash-box-color-3">
                                <div class="dash-box-icon">
                                    <i class="far fa-calendar-check"></i>
                                </div>
                                <div class="dash-box-body">
                                     <span class="dash-box-count">{{$AppointmentCountData or '0'}}</span>
                                    <span class="dash-box-title">Appointments Today</span>
                                </div>

                                <div class="dash-box-action">
                                    <button class="stuff_btn"><a href="{{ route('appointments.get') }}">More Info</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

               {{--Data boxes--}}

                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="dash-box dash-box-color-1">
                                <div class="dash-box-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="dash-box-body">
                                    <span class="dash-box-count">{{$PatientCountData or '0'}}</span>
                                    <span class="dash-box-title">My Patients</span>
                                </div>

                                <div class="dash-box-action">
                                    <button class="stuff_btn"><a href="{{ route('patients.index') }}">More Info</a></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="dash-box dash-box-color-2">
                                <div class="dash-box-icon">
                                    <i class="fas fa-pills" aria-hidden="true"></i>
                                </div>

                                <div class="dash-box-body">
                                    <span class="dash-box-count">{{$treatmentCountData or '0'}}</span>
                                    <span class="dash-box-title">Treatments</span>
                                </div>

                                <div class="dash-box-action">
                                    <button class="stuff_btn"><a href="{{ route('treatments.index') }}">More Info</a></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="dash-box dash-box-color-3">
                                <div class="dash-box-icon">
                                    <i class="fas fa-file-medical-alt"></i>
                                </div>
                                <div class="dash-box-body">
                                    <span class="dash-box-count">0</span>
                                    <span class="dash-box-title">Patients reports</span>
                                </div>

                                <div class="dash-box-action">
                                    <button class="stuff_btn"><a href="#">More Info</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--charts--}}
                <div class="container">
                    <div class="row " style="margin-top:20px;margin-bottom:60px;">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Patients Data</h5>
                                    <div class="card-text">
                                         <div id="wrapper" style="min-height:500px;height: 100%;width: 100%;margin:auto;background:#fff;text-align:center">
                                        @if(isset($activeChartData))
                                            @include('charts.google-2-chart',['activeChartData'=>$activeChartData])
                                        @endif
                                    </div>
                                </div>

                                </div>
                            </div>
                        </div>
                
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Patients Data</h5>
                                    <div class="card-text">
                                        <div id="wrapper" style="min-height:500px;height: 100%;width: 100%;margin:auto;background:#fff;text-align:center">
                                        @if(isset($visitorChartData))
                                            @include('charts.google-pie-cancer-type-chart',['visitorChartData'=>$visitorChartData])
                                        @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @elseif(Auth::user()->isPatient())
                <div class="container bootstrap snippet ">
                    <div class="row margin-bottom-10  ">
                        <div class="box col-sm-6 ">
                            <div class="servive-block servive-block-1">
                                <i class="icon-3x color-light fas fa-heartbeat fa-3x"></i>
                                <h2 class="heading-md">Self Reports</h2>
                                <div class="text-box">
                                    <p>You have not recorded any symptoms for the last day. </p>
                                </div>
                                <button type="button" class="btn-style">Report Now</button>

                            </div>
                        </div>

                        <div class="box col-sm-6 ">
                            <div class="servive-block servive-block-2">
                                <i class="icon-3x color-light fas fa-stethoscope fa-3x"></i>
                                <h2 class="heading-md">Patients Treatments</h2>
                                <div class="text-box">
									 <p>{{$treatmentCountDataPatient or '0'}}</p>
                                </div>
                                <button type="button" class="btn-style">Add new treatment</button>

                            </div>
                        </div>
                        <div class="box col-sm-6">
                            <div class="servive-block rounded servive-block-3">
                                <i class="icon-3x color-light fas fa-pills fa-3x"></i>
                                <h2 class="heading-md">Medications</h2>
                                <div class="text-box">
                                    
                                </div>
                                <button type="button" class="btn-style">Add new medications</button>
                            </div>
                        </div>
                        <div class="box col-sm-6">
                            <div class="servive-block rounded servive-block-4">
                                <i class="icon-3x color-light fas fa-pills fa-3x"></i>
                                <h2 class="heading-md">Symptoms</h2>
                                <div class="text-box">
                                    <p></p>
                                </div>
                                <button type="button" class="btn-style">Add new medications</button>
                            </div>
                        </div>
                    </div>
                </div>
             @elseif(Auth::user()->isSecratory())
             <div class="container bootstrap snippet ">
                    <div class="row margin-bottom-10  ">
                        <div class="box col-sm-6 ">
                            <div class="servive-block servive-block-1">
                                <i class="icon-3x color-light fas fa-heartbeat fa-3x"></i>
                                <h2 class="heading-md">Schedule</h2>
                                <div class="text-box">
                                    <p>Create new schedule for the doctors </p>
                                </div>
                                <button type="button" class="btn-style"><a href="{{ route('slots_time.index') }}">Show Schedule</a></button>

                            </div>
                        </div>

                        <div class="box col-sm-6 ">
                            <div class="servive-block servive-block-2">
                                <i class="icon-3x color-light fas fa-stethoscope fa-3x"></i>
                                <h2 class="heading-md">Today Appointments</h2>
                                <div class="text-box">
                                    <p>{{$AppointmentCountData or '0'}}</p>
                                </div>
                                <button type="button" class="btn-style">Show Appointments</button>

                            </div>
                        </div>
             
                    </div>
                </div>
            @endif
        </div>
    </div>

<script>
    $(window).resize(function(){
    drawChart();
});
</script>


@stop
