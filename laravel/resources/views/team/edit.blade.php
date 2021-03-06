@extends ('layouts.portal')

@section ('content')
    <div class="page-wrapper">
        <div class="page-wrapper-container">
            <h1>Edit staff member</h1>
            <div class="steps">
                <ol class="direction">
                    <li>
                        Please add a staff member.
                    </li>
                    <li>
                        Select the right role.
                    </li>
                </ol>
            </div>
            <div class="container">
                 <form class="form-style" name="myform" method="post" action="{{action('TeamController@Team_update',$users->id)}}">
                    @csrf
                    <div class="form-group">
                        <label for="role">Role:</label>
                        @if(Auth::user()->isDoctor())
                           <select class="form-control" id="role" name="role">
                            <option <?php if($users->role == '1'){ ?> selected <?php } ?> value="1">Doctor</option>
                            <option <?php if($users->role == '2'){ ?> selected <?php } ?> value="2">Nurse</option>
                            <option <?php if($users->role == '5'){ ?> selected <?php } ?> value="5">Admin</option>
                          </select>
                        @elseif(Auth::user()->isAdmin())
                           <select class="form-control" id="role" name="role">
                            <option <?php if($users->role == '1'){ ?> selected <?php } ?> value="1">Doctor</option>
                            <option <?php if($users->role == '2'){ ?> selected <?php } ?> value="2">Nurse</option>
                           </select>
                        @endif

                        
                    </div>

                    <div class="form-group">
                        <label for="identification_number">Identification Number:</label>
                        <input value="{{$users->identification_number}}" type="text" class="form-control" id="identification_number"
                               placeholder="Enter identification number" name="identification_number" required="required">
                    </div>

                    <div class="form-group">
                        <label for="first_name">First name:</label>
                        <input type="text" value="{{$users->first_name}}" class="form-control" id="first_name" placeholder="Enter First name"
                               name="first_name" required="required">
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last name:</label>
                        <input type="text"  value="{{$users->last_name}}" class="form-control" id="last_name" placeholder="Enter Last name"
                               name="last_name" required="required">
                    </div>

                   <div class="form-group">
                        <label for="birth_date">Birth Date:</label>
                        <input type="date"  class="form-control" value="{{$users->birth_date}}" id="birth_date" name="birth_date>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" value="{{$users->email}}" class="form-control" id="email" placeholder="Enter email" name="email" required="required">
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input id="pass" name="password" type="text" size="40">
                        <input type="button" class="button" value="Generate" onClick="generate();" tabindex="2">
                        {{-- <input type="buttonbtn btn-success" class="generate d-inline btn btn-success" value="Generate" onClick="generate();" tabindex="2"> --}}
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone number:</label>
                        <input type="tel" value="{{$users->phone}}" class="form-control" id="phone" name="phone" placeholder="Enter Phone number" required="required"
                               size="20" minlength="9" maxlength="14">
                    </div>

                    <button type="submit" class="btn btn-primary bg-info">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-styles/pages/admin-form-big.css') }} ">
    <script>
        function randomPassword(length) {
            var chars = "abcdefghijklmnopqrstuvwxyz!@#$%^&*()-+<>ABCDEFGHIJKLMNOP1234567890";
            var pass = "";
            for (var x = 0; x < length; x++) {
                var i = Math.floor(Math.random() * chars.length);
                pass += chars.charAt(i);

            }

            return pass;
        }

        function generate() {
            myform.password.value = randomPassword(8);

        }
    </script>
@stop
