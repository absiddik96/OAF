<div class="col-md-6">
    <div class="form-group form-float">
        <div class="form-line">
            {!! Form::text('ssc_board', null, ['class'=>'form-control','required'=>'']) !!}
            <label class="form-label">Board*</label>
        </div>
    </div>
    <div class="form-group form-float">
        <div class="form-line">
            {!! Form::text('ssc_name_of_institute', null, ['class'=>'form-control','required'=>'']) !!}
            <label class="form-label">Name of Institute*</label>
        </div>
    </div>
    <div class="form-group form-float">
        <div class="form-line">
            {!! Form::number('ssc_passing_year', null, ['class'=>'form-control','required'=>'','maxlength'=>'4']) !!}
            <label class="form-label">SSC Passing Year*</label>
        </div>
    </div>
    <div class="form-group form-float">
        <div class="form-line">
            {!! Form::number('ssc_gpa', null, ['class'=>'form-control','required'=>'']) !!}
            <label class="form-label">GPA*</label>
        </div>
    </div>
    <div class="form-group form-float">
        <div class="">
            <label style="color: #AAAAAA;font-weight: normal;" class="form-label">Marksheet*</label>
            {!! Form::file('ssc_marksheet', ['required'=>'']) !!}
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group form-float">
        <div class="form-line">
            {!! Form::text('hsc_board', null, ['class'=>'form-control','required'=>'']) !!}
            <label class="form-label">Board*</label>
        </div>
    </div>
    <div class="form-group form-float">
        <div class="form-line">
            {!! Form::text('hsc_name_of_institute', null, ['class'=>'form-control','required'=>'']) !!}
            <label class="form-label">Name of Institute*</label>
        </div>
    </div>
    <div class="form-group form-float">
        <div class="form-line">
            {!! Form::number('hsc_passing_year', null, ['class'=>'form-control','required'=>'','maxlength'=>'4']) !!}
            <label class="form-label">HSC Passing Year*</label>
        </div>
    </div>
    <div class="form-group form-float">
        <div class="form-line">
            {!! Form::number('hsc_gpa', null, ['class'=>'form-control','required'=>'']) !!}
            <label class="form-label">GPA*</label>
        </div>
    </div>
    <div class="form-group form-float">
        <div class="">
            <label style="color: #AAAAAA;font-weight: normal;" class="form-label">Marksheet*</label>
            {!! Form::file('hsc_marksheet', ['required'=>'']) !!}
        </div>
    </div>

</div>
