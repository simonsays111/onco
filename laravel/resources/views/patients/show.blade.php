@extends ('layouts.portal')

@section ('content')
    <div class="page-wrapper">
        <div class="page-wrapper-container">
            <h1>{{ $patient->name }} treatment information</h1>

            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Treatment ID</th>
                    <th>Patient Name</th>
                    <th>Description</th>
                    <th>Start</th>
                    <th>End</th>
                  

                </tr>
                </thead>
                <tbody>
                @foreach ( $patient->treatments as $patient_treatment)
                    <tr>
                        <td>{{ $patient_treatment->id}}</td>
                        <td>{{ $patient_treatment->name}}</td>
                        <td>{{ $patient_treatment->description}}</td>
                        <td>{{ $patient_treatment->created_at}}</td>
                        <td>{{ $patient_treatment->ends_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-styles/pages/admin-index.css') }} ">

@stop
