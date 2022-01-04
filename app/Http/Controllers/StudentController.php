<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
class StudentController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	public function show(Student $student) {
		return view('sb-admin.student.show',compact('student'));
	}

	public function maleIndex() {
		$students = Student::where('gender','male')->get();
		return view('sb-admin.student.index',compact('students'));
	}

	public function femaleIndex() {
		$students = Student::where('gender','female')->get();
		return view('sb-admin.student.index',compact('students'));
	}


	public function create() {
		return view('sb-admin.student.create');
	}

	public function store(Request $request) {
		// return $request->all();
		$request['user_id'] =auth()->user()->id;
		Student::create($request->all());
		if($request->gender=='male'){
			return redirect()->route('student.male_index')->with(['status'=>'success','message'=>'تم']);
		}elseif($request->gender=='female'){
			return redirect()->route('student.female_index')->with(['status'=>'success','message'=>'تم']);
		}
		
	}

	
	public function edit(Student $student) {
		return view('student.edit', compact('student'));
	}

	public function update(Request $request,Student $student) {
		$student->update($request->all());
		return redirect()->route('student.male_index');

	}

	public function studentPointStore(Request $request) {
		return $request->all();
	}



}
