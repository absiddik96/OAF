<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
        <link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/pdf_style.css') }}">
    </head>
    <body>
        <div class="text-center">
            <img width="70px" src="{{ asset('images/logo/gb_logo.png') }}" alt="">
            <h3>Gono Bishwabidyalay</h3>
            <small>Admit Card</small><br>
            <small>Department of application : {{ $student->department->dept }}</small><br>
            <small>Admission Season : {{ $student->examSeason->exam_season }}</small><br>
        </div>
        <br>
        <table>
            <tr>
                <td width="400px">
                    <table class="table-padding">
                        <tr>
                            <td>Name</td>
                            <td width="1px">:</td>
                            <td>{{ $student->name }}</td>
                        </tr>
                        <tr>
                            <td>Registration Token</td>
                            <td width="1px">:</td>
                            <td>{{ $student->reg_token }}</td>
                        </tr>
                        <tr>
                            <td>Signature</td>
                            <td width="1px">:</td>
                            <td>
                                @if ($student->getOriginal('signature') != '')
                                    <img width="150px"  src="{{ $student->signature }}" alt="">
                                @endif
                            </td>
                        </tr>
                    </table>
                </td>
                <td width="63px"></td>
                <td style="padding-left: 50px; padding-top: 10px" valign="top" align="right" style="padding-top: 0" width="40%">
                    @if ($student->getOriginal('photo') != '')
                        <img width="150px" src="{{ $student ? $student->photo : '' }}" alt="">
                    @endif
                </td>
            </tr>
        </table>
        <br><br><br>
        <div style="padding-left: 500px">
            <div class="text-center">
                <img width="150px" src="{!! asset('uploads/admission_controller/signature.png') !!}" alt="">
                <small>Admission Controller</small>
            </div>
        </div>

    </body>
</html>
