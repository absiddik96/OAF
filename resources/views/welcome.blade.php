@extends('layouts.front')
@section('content')
    <div class="card">
        <div class="body">
            <div class="text-center">
                <img style="min-width: 70px" src="{{ asset('images/logo/gb_logo.png') }}" width="7%" alt="">
                <span style="line-height:12px">
                    <h2 style="padding:0">Gono Bishwabidyalay</h2>
                    <p><b>Exam Season:</b> {{ $ad?$ad->examSeason->exam_season:'' }}</p>
                    <p><b>Registration Deadline:</b> {{ $ad?$ad->deadline:'' }}</p>
                    <p><b>Registration Token:</b> {{ $reg_token }} </p>
                </span>
            </div>
            <div class="form-horizontal">
                <div class="form-group form-float">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Department</label>
                        <div class="col-sm-6">
                            <div class="form-line">
                                {!! Form::select('exam_season', [''=>'Choose']+$depts, null, ['class'=>'form-control','required'=>'','id'=>'dept']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div hidden id="admission_form" class="card">
        <div class="header">
            <h2>ADMISSION FORM</h2>
        </div>
        <div class="body">
            {!! Form::open(['route'=>'admission-form.store','method'=>'post','class'=>'my_form','id'=>'wizard_with_validation','enctype' => 'multipart/form-data']) !!}
                @include('includes.errors')

                <input id="reg_token" type="text" name="reg_token" value="{{ $reg_token }}">
                <input id="dept_id" type="text" name="department_id" value="">
                <input hidden type="text" name="exam_season_id" value="{{ $ad?$ad->exam_season_id:'' }}">

                <h3>Payment</h3>
                <fieldset>
                    @include('admission_form.payment')
                </fieldset>

                <h3>Student Information</h3>
                <fieldset>
                    @include('admission_form.student_info')
                </fieldset>

                <h3>Educational Qualification</h3>
                <fieldset>
                    @include('admission_form.edu_qua')
                </fieldset>

                <h3>Parents Information</h3>
                <fieldset>
                    @include('admission_form.parents_info')
                </fieldset>

                <h3>Guardian Information</h3>
                <fieldset>
                    @include('admission_form.guardian_info')
                </fieldset>

                <h3>Terms & Conditions - Finish</h3>
                <fieldset>
                    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                    <input id="acceptTerms-2" name="acceptTerms" type="checkbox" required>
                    <label for="acceptTerms-2">I agree with the Terms and Conditions.</label>
                </fieldset>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('#dept').on('change',function() {
            if ($(this).val()) {
                $('#admission_form').prop('hidden',false);
                $('#dept_id').val($(this).val())
                $('#dept_id').prop('hidden',true)
                $('#reg_token').prop('hidden',true)
            }else {
                $('#admission_form').prop('hidden',true);
            }
        });
    </script>
@endsection
