@extends ('layouts.portal')

@section ('content')
    <div class="page-wrapper">
        <div class="page-wrapper-container">
            <h1>Patients</h1>
            @if(Auth::user()->isDoctor() || Auth::user()->isAdmin())
             <a href="{{ route('patients.create') }}" class="btn btn-info add-btn bg-info"><i class="fas fa-plus"></i>Add</a>
            @endif

			 <div class="steps">
                <ol class="direction">
                    <li>
                        Here you can add new patients.
                    </li>
                    <li>
                        You can edit, delete and view patients' inforamtion.
                    </li>
                </ol>
            </div>
			
            <table id="patients" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Patient ID</th>
                    <th>Patient Name</th>
                    <th>Patient Status</th>
                    <th>Gender</th>
                    <th>Cancer Type</th>   
                    <th>Actions</th>
                    
                </tr>
                </thead>
                <tbody>
                @foreach ($patients as $patient)
                    @if(Auth::user()->isDoctor())
                        @if(Auth::user()->id ==  $patient->patient_data->doctor_id) 
                            <tr>
                                <td>{{ $patient->patient_data->user_id or '--N\A--' }}</td>
                                <td>{{ $patient->name or '--N\A--'  }}</td>
                                <td>{{ $patient->patient_data->patient_status or '--N\A--' }}</td>
                                <td>{{ $patient->patient_data->gender or '--N\A--'  }}</td>
                                <td>{{ $patient->patient_data->type or '--N\A--'  }}</td>
                               
                                <td>
                                        <a href="{{action('PatientsController@Patient_edit',$patient->id)}}"  class="btn btn-primary opt-btn fa fa-edit"><span class="edit "> Edit </span></a>
                                        <a href="/patients_delete/{{$patient->id}}"  onclick="return confirm('Are you sure you want to delete this patient?');" class="btn btn-danger opt-btn far fa-trash-alt"><span class="edit del">Delete</span></a>
                                        <a href="{{ route('patients.show', [$patient]) }}" class="btn btn-success opt-btn fas fa-user-edit"><span class="edit del opt-1">Treatment</span></a>
                                </td>
                            </tr>
                        @endif
                    @else

                        <tr>
                            <td>{{ $patient->patient_data->user_id or '--N\A--' }}</td>
                            <td>{{ $patient->name or '--N\A--'  }}</td>
                            <td>{{ $patient->patient_data->patient_status or '--N\A--' }}</td>
                            <td>{{ $patient->patient_data->gender or '--N\A--'  }}</td>
                            <td>{{ $patient->patient_data->type or '--N\A--'  }}</td>
                           
                            <td>
                                @if(Auth::user()->isDoctor() || Auth::user()->isAdmin())
                                    <a href="{{action('PatientsController@Patient_edit',$patient->id)}}"  class="btn btn-primary opt-btn fa fa-edit"><span class="edit "> Edit </span></a>
                                    <a href="/patients_delete/{{$patient->id}}"  onclick="return confirm('Are you sure you want to delete this patient?');" class="btn btn-danger opt-btn far fa-trash-alt"><span class="edit del">Delete</span></a>

                                    <a href="{{ route('patients.show', [$patient]) }}" class="btn btn-success opt-btn fas fa-user-edit"><span class="edit del">Treatment</span></a>
                                @else
                                Not Allowed Action
                            
                                @endif

                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-styles/pages/admin-index.css') }} ">



@stop
