@extends ('layouts.portal') @section ('content')
<div class="page-wrapper">
    <div class="page-wrapper-container">
        <h1>Medications</h1>
        <div class="steps">
            <ol class="direction">
                <li>Please check the medication after taking it.</li>
                <li>Don't forget to submit at the end.</li>
            </ol>
        </div>

        <!---time---->
        <div class="time">
            <span class="hms"></span>
            <span class="ampm"></span>
            <br>
            <span class="date"></span>
        </div>

        <div class="main-container">


            <form method="POST" name="medications_form" action="
		{{action('Patients\MedicationLogsController@postMedicationByPatient') }}" class="form-medication">
                {{ @csrf_field() }}
                <div class="text-center position">

                    @foreach (App\TreatmentMedication::DAY_PARTS as $key => $name)
                    <!-- Start {{ $name }} -->
                    <div class="card text-black bg-light m-3 d-inline">
                        <div class="card-header" id="card-{{ strtolower($name) }}">
                            <img class="top-img" width="50" height="50" src="/images/medication-time/{{ $key }}.png" style="position:relative;top:-8px;left:-50px;">
                            <p class="daytime-text">{{ $name }}</p>
                        </div>
                        <div class="card-body">
                            <div class="list-group">
                                @if (isset($medications[$key])) 
                                @foreach ($medications[$key] as $medication)
                                @php ($isdisabled = 'No')
                                @if(in_array($medication['tm_id'],$currentDateMedicationLog))
                                    @php ($isdisabled = 'Yes')
                                @endif
                                <button type="button" class="list-group-item  list-group-item-action {{ strtolower($name) }}-box">
											<div class="image">
												<img class="pill-img" src="/images/pills/1484942362ios-emoji-pill.png" alt="{{ $medication['name'] }}">
											</div>
											<p class="image-info"></p>
											<label class="container">{{ $medication['name'] }}
												<input  type="checkbox" class="meditation_chk" alreadybook="{{$isdisabled}}" name="treatmentmedications[]" value="{{ $medication['tm_id'] }}">
												<span class="checkmark"></span>
											</label>
										</button> @endforeach @endif
                            </div>
                        </div>
                    </div>
                    <!-- End {{ $name }} -->
                    @endforeach
                </div>

                <div class="clearfix"></div>

                <button class="btn btn-default t-20" id="mecication-submit" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>

{{-- CSS --}}
<link rel="stylesheet" href="{{ asset('/css/patients-style/pages/medication.css') }}"> {{-- JS --}}
<script src="{{ asset('/js2/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('/js2/medications.js') }}"></script>
<script src="{{ asset('/js2/custom.js') }}"></script>
<script>
    timeChecker();
</script>
@stop
