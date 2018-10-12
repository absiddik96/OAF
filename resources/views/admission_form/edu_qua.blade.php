<div class="col-md-12">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Examination</th>
                <th>Board</th>
                <th>Name of Institute</th>
                <th>Passing Year</th>
                <th>GPA</th>
                <th>Marksheet</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>SSC</th>
                <th>{!! Form::text('ssc_board', null, ['class'=>'form-control']) !!}</th>
                <th>{!! Form::text('ssc_name_of_institute', null, ['class'=>'form-control']) !!}</th>
                <th>{!! Form::number('ssc_passing_year', null, ['class'=>'form-control','maxlength'=>'4']) !!}</th>
                <th>{!! Form::number('ssc_gpa', null, ['class'=>'form-control']) !!}</th>
                <th>{!! Form::file('ssc_marksheet', []) !!}</th>
            </tr>
            <tr>
                <th>HSC</th>
                <th>{!! Form::text('hsc_board', null, ['class'=>'form-control']) !!}</th>
                <th>{!! Form::text('hsc_name_of_institute', null, ['class'=>'form-control']) !!}</th>
                <th>{!! Form::number('hsc_passing_year', null, ['class'=>'form-control','maxlength'=>'4']) !!}</th>
                <th>{!! Form::number('hsc_gpa', null, ['class'=>'form-control']) !!}</th>
                <th>{!! Form::file('hsc_marksheet', []) !!}</th>
            </tr>
        </tbody>
    </table>
</div>
