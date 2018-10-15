<?php

namespace App\Http\Controllers\Admin\Applicant;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\ApplicationDeadlines as AD;
use App\Models\Admission\Form\Student;

class ApplicantsController extends Controller
{
    public function index()
    {
        $ad = AD::where('status',AD::UNACCOMPLISHED)->orderBy('deadline','desc')->first();
        if ($ad) {
            $applicants = Student::where('exam_season_id',$ad->exam_season_id)->get();
        }else {
            Session::flash('info','No unaccomplished exam season found');
            return redirect()->back();
        }
        return view('admin.applicants.index')
                ->with('applicants', $applicants);
    }

    public function show($applicant_id)
    {
        $student = Student::find($applicant_id);
        $next_id = Student::where('id','>',$student->id)->min('id');
		$prev_id = Student::where('id','<',$student->id)->max('id');

        return view('admin.applicants.show')
                ->with('next_id', $next_id)
                ->with('prev_id', $prev_id)
                ->with('applicant', $student);
    }

    public function makeApproved($applicant_id)
    {
        $student = Student::find($applicant_id);
        $student->status = true;
        if ($student->save()) {
            Session::flash('success','Applicants approved successfully');
        }
        return redirect()->back();

    }

    public function makeUnapproved($applicant_id)
    {
        $student = Student::find($applicant_id);
        $student->status = false;
        if ($student->save()) {
            Session::flash('success','Applicants unapproved successfully');
        }
        return redirect()->back();

    }

    public function archiveSeasonList()
    {
        return view('admin.archive.index')
                ->with('seasons', AD::where('status', AD::ACCOMPLISHED)->orderBy('deadline','desc')->get());
    }

    public function archiveList($season_id,$approve)
    {
        if ($approve == 'approved') {
            $is_approved = '1';
        }elseif ($approve == 'unapproved') {
            $is_approved = '0';
        }

        $applicants = Student::where([
            'exam_season_id' => $season_id,
            'status' => $is_approved,
        ])->get();
        return view('admin.archive.show')
                ->with('applicants', $applicants);
    }
}
