<?php

namespace App\Http\Controllers\Admission\form;

use Session;
use Illuminate\Http\Request;
use App\Models\Admin\Department;
use App\Http\Controllers\Controller;
use App\Models\Admission\Form\Student;
use App\Models\Admission\Form\Parents;
use App\Models\Admission\Form\Guardian;
use App\Models\Admission\Form\Payment;
use App\Models\Admin\ApplicationDeadlines as AD;
use App\Http\Requests\AdmissionFormCreateRequest;
use App\Models\Admission\Form\EducationalQualification as EQ;

class AdmissionFormsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('welcome')
                ->with('ad', AD::where('status',AD::UNACCOMPLISHED)->orderBy('deadline','desc')->first())
                ->with('blood_group', Student::BLOOD_GROUP)
                ->with('reg_token', $this->registration_token())
                ->with('depts', Department::orderBy('dept')->pluck('dept','id')->all());
    }

    public function registration_token()
    {
        return rand(1000,9999).chr(rand(65,90)).rand(10,99).chr(rand(65,90)).chr(rand(65,90)).rand(100,900);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdmissionFormCreateRequest $request)
    {
        $input = $request->all();

        // student
        $input['dob']       = date('Y-m-d',strtotime($request->date_of_birth));
        $input['photo']     = $this->imageUpload($request->photo,'students/photo');
        $input['signature'] = $this->imageUpload($request->signature,'students/signature');
        $student            = Student::create($input);

        // Payment
        $input['student_id']    = $student->id;
        Payment::create($input);

        // Educational Qualification
        $input['student_id']    = $student->id;
        $input['ssc_marksheet'] = $this->imageUpload($request->ssc_marksheet,'marksheets/ssc');
        $input['hsc_marksheet'] = $this->imageUpload($request->hsc_marksheet,'marksheets/hsc');
        EQ::create($input);

        // Parents
        $input['student_id']   = $student->id;
        $input['father_photo'] = $this->imageUpload($request->father_photo,'parents/father');
        $input['mother_photo'] = $this->imageUpload($request->mother_photo,'parents/mother');
        Parents::create($input);

        // Guardian
        $guardian                          = new Guardian;
        $guardian->student_id              = $student->id;
        $guardian->name                    = $request->guardian_name;
        $guardian->photo                   = $this->imageUpload($request->guardian_photo,'guardians/photo');
        $guardian->occupation              = $request->guardian_occupation;
        $guardian->salary                  = $request->guardian_salary;
        $guardian->email                   = $request->guardian_email;
        $guardian->contact_number          = $request->guardian_contact_number;
        $guardian->relationship_of_student = $request->relationship_of_student;
        $guardian->signature               = $this->imageUpload($request->guardian_signature,'guardians/signature');

        if ($guardian->save()) {
            Session::flash('success','Application submitted successfully');
        }
        return redirect()->back();
    }

    public function imageUpload($image,$path)
    {
        $new_name = '';
        if ($image) {
            $new_name = time().'.'.$image->getClientOriginalExtension();
            $image->move('public/uploads/'.$path.'/',$new_name);
        }
        return $new_name;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
