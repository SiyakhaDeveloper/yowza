@extends('layouts.app')

@section('content')
    <div>
        <div class="lg:p-12 max-w-xl lg:my-0 my-12 mx-auto p-6 space-y-">
            <form class="lg:p-10 p-6 space-y-3 relative bg-white shadow-xl rounded-md" action="{{ route('register') }}" method="post">
                @csrf
                <h1 class="lg:text-2xl text-xl font-semibold mb-6"> {{ __('Register') }} </h1>

                <div class="grid lg:grid-cols-2 gap-3">
                    <div>
                        <label class="mb-0" for="first-name"> {{ __('Name') }} </label>
                        <input type="text" placeholder="Your Name"  id="first-name"  name="name" value="{{ old('name') }}" required autocomplete="name" autofocus class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full @error('name') is-invalid @enderror">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div>
                        <label class="mb-0" for="last-name"> Last  Name </label>
                        <input type="text" placeholder="Last  Name"  id="last-name" class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full">
                    </div>
                </div>

                <div>
                    <label class="mb-0" for="email"> {{ __('Email Address') }} </label>
                    <input type="email" placeholder="Info@example.com" required autocomplete="email" id="email" class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div>
                    <label class="mb-0" for="userType">Who are your signing up as </label>



                    <select id="role"  class="form-control selectpicker mt-2" name="role" required>
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}" data-show-fields="{{ $role->name }}">
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>

                </div>
                <div>
                    <label class="mb-0" for="password"> {{ __('Password') }} </label>
                    <input type="password" placeholder="******" name="password" required autocomplete="new-password" id="password" class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full @error('password') is-invalid @enderror">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div>
                    <label class="mb-0" for="password"> {{ __('Confirm Password') }} </label>
                    <input type="password" placeholder="******" name="password_confirmation" required autocomplete="new-password" id="password-confirm" class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full">

                </div>
                <div id="funder-fields" style="display: none;">
                    <!-- 'Corporate Customer / Donor / Funder' specific fields -->
                    <div class="form-group">
                        <label class="mb-0" for="organisation_name">Organisation Name</label>
                        <input type="text" name="organisation_name" id="organisation_name" class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full">
                    </div>

                    <div class="form-group">
                        <label class="mb-0" for="registration_number">Registration Number</label>
                        <input type="text" name="registration_number" id="registration_number" class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full">
                    </div>

                    <div>
                        <label class="mb-0" for="sequestration_status">Has your Estate ever been under provisional or final sequestration?</label>
                        <select name="sequestration_status" id="sequestration_status" class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full selectpicker border rounded-md col-span-2">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="liquidation_status">Has your Estate ever been provisionally or finally liquidated?</label>
                        <select name="liquidation_status" id="liquidation_status" class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full selectpicker border rounded-md col-span-2">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="judicial_management_status">Has your business ever been placed under judicial management or business rescue?</label>
                        <select name="judicial_management_status" id="judicial_management_status" class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full selectpicker border rounded-md col-span-2">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="insolvent_status">Have you ever been declared insolvent as contemplated in the Insolvency Act,24 of 1936?</label>
                        <select name="insolvent_status" id="insolvent_status" class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full selectpicker border rounded-md col-span-2">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="conviction_status">Have you been convicted in South Africa or elsewhere of any offence of which dishonesty is an element or for any other offence for which you were sentenced to either imprisonment without the option of a fine or a fine in excess of R25 000?</label>
                        <select name="conviction_status" id="conviction_status" class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full selectpicker border rounded-md col-span-2">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
                <div id="social-enterprises-fields" style="display: none;">
                    <!-- Social Enterprises specific fields -->
                    <div class="form-group row">
                        <label for="organisation_name" class="col-md-4 col-form-label text-md-right">Organisation Name</label>
                        <div class="col-md-6">
                            <input id="organisation_name" type="text" class="form-control @error('organisation_name') is-invalid @enderror" name="organisation_name" value="{{ old('organisation_name') }}" required>
                            @error('organisation_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!-- Add other Social Enterprises specific fields -->
                </div>
                <script>
                    document.getElementById('role').addEventListener('change', function () {
                        var selectedRole = this.options[this.selectedIndex].getAttribute('data-show-fields');
                        var socialEnterprisesFields = document.getElementById('social-enterprises-fields');

                        if (selectedRole === 'Social Enterprises') {
                            socialEnterprisesFields.style.display = 'block';
                        } else {
                            socialEnterprisesFields.style.display = 'none';
                        }
                    });
                </script>
{{--                <div id="social-enterprise-fields" style="display: none;">--}}
{{--                    <!-- 'Social Enterprises' specific fields -->--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="organisation_name_social">Organisation Name</label>--}}
{{--                        <input type="text" name="organisation_name_social" id="organisation_name_social" class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full">--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="organisation_landline">Organisation Landline</label>--}}
{{--                        <input type="text" name="organisation_landline" id="organisation_landline" class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full">--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <label for="province">Province</label>--}}
{{--                        <select name="province" id="province" class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full selectpicker border rounded-md col-span-2">--}}
{{--                            <option value="" selected disabled>Select your option</option>--}}
{{--                            <option value="Eastern Cape">Eastern Cape</option>--}}
{{--                            <option value="Free State">Free State</option>--}}
{{--                            <option value="Gauteng">Gauteng</option>--}}
{{--                            <option value="Kwa-Zulu Natal">Kwa-Zulu Natal</option>--}}
{{--                            <option value="Limpopo">Limpopo</option>--}}
{{--                            <option value="Mpumalanga">Mpumalanga</option>--}}
{{--                            <option value="Northern Cape">Northern Cape</option>--}}
{{--                            <option value="North West">North West</option>--}}
{{--                            <option value="Western Cape">Western Cape</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <label for="city">City</label>--}}
{{--                        <input type="text" name="city" id="city" class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full">--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <label for="address">Address</label>--}}
{{--                        <input type="text" name="address" id="address" class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full">--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <label for="organisation_type">Organisation Type</label>--}}
{{--                        <select name="organisation_type" id="organisation_type" class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full selectpicker border rounded-md col-span-2">--}}
{{--                            <option value="" selected disabled>Select your option</option>--}}
{{--                            <option value="Non-Profit organisation">Non-Profit organisation</option>--}}
{{--                            <option value="Non-Governmental organisation">Non-Governmental organisation</option>--}}
{{--                            <option value="Public Benefit organization">Public Benefit organization</option>--}}
{{--                            <option value="Charity">Charity</option>--}}
{{--                            <option value="Trust">Trust</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <label for="registration_number_social">Registration Number</label>--}}
{{--                        <input type="text" name="registration_number_social" id="registration_number_social" class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full">--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <label for="organisation_objective">Organisation Objective</label>--}}
{{--                        <select name="organisation_objective" id="organisation_objective" class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full selectpicker border rounded-md col-span-2">--}}
{{--                            <option value="" selected disabled>Select your option</option>--}}
{{--                            <option value="Education">Education</option>--}}
{{--                            <option value="Job creation">Job creation</option>--}}
{{--                            <option value="Environmental imperatives">Environmental imperatives</option>--}}
{{--                            <option value="Poverty alleviation">Poverty alleviation</option>--}}
{{--                            <option value="Youth development">Youth development</option>--}}
{{--                            <option value="Health">Health</option>--}}
{{--                            <option value="Other">Other</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}

{{--                    <!-- Add other 'Social Enterprises' specific fields similarly -->--}}

{{--                </div>--}}


                {{--                <div class="grid lg:grid-cols-2 gap-3">--}}
{{--                    <div>--}}
{{--                        <label class="mb-0"> Gender </label>--}}
{{--                        <select class="selectpicker mt-2">--}}
{{--                            <option>Male</option>--}}
{{--                            <option>Female</option>--}}
{{--                        </select>--}}

{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <label class="mb-0"> Phone: optional  </label>--}}
{{--                        <input type="text" placeholder="+543 5445 0543" class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full">--}}
{{--                    </div>--}}
{{--                </div>--}}

                <br>

                    <div class="checkbox">
                    <input type="checkbox" id="chekcbox1" checked="">
                    <label for="chekcbox1"><span class="checkbox-icon"></span> I agree to the <a href="pages-terms.html" target="_blank" class="uk-text-bold uk-text-small uk-link-reset"> Terms and Conditions </a>
                    </label>
                    </div>

                <div>
                    <button type="submit" class="bg-blue-600 font-semibold p-2 mt-5 rounded-md text-center text-white w-full">
                        {{ __('Register') }}</button>
                </div>

                <script>
                    document.getElementById('role_id').addEventListener('change', function () {
                        var funderFields = document.getElementById('funder-fields');

                        if (this.value == 2) { // 'Corporate Customer / Donor / Funder'
                            funderFields.style.display = 'block';
                        } else {
                            funderFields.style.display = 'none';
                        }
                    });
                </script>
                <script>
                    document.getElementById('role').addEventListener('change', function () {
                        var selectedRole = this.options[this.selectedIndex].getAttribute('data-show-fields');
                        var socialEnterprisesFields = document.getElementById('social-enterprises-fields');

                        if (selectedRole === 'Social Enterprises') {
                            socialEnterprisesFields.style.display = 'block';
                        } else {
                            socialEnterprisesFields.style.display = 'none';
                        }
                    });
                </script>


            </form>


        </div>
    </div>
@endsection
