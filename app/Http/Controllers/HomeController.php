<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Program;
use App\Models\Studentstatement;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Wakeel;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	public function dashboard() {
		// $loggedUser = auth()->user();

		// $studentstatement = Studentstatement::where('user_id',$loggedUser->id)->select(DB::raw('sum(amount) as total'))->first();

		// if($loggedUser->userType=='teacher'){
		// 	$program = Program::where('user_id',$loggedUser->parent)->orderby('id','desc')->first();
		// 	if($program){
		// 		$students = Student::whereHas('programs',function($q)use($program){
		// 			$q->where('program_student.program_id',$program->id);
		// 		})->get();
		// 	}else{
		// 		$students=[];
		// 	}
		// }

		$studentstatements = Studentstatement::all();
		$programs = Program::all();
		$students = Student::all();
		$teachers = Teacher::all();
		$wakeels = Wakeel::all();
		$tasks = Task::all();
		$masjeds = User::where('userType','masjed')->get();


		return view('sb-admin.dashboard',compact('wakeels','teachers','students','masjeds','studentstatements','programs','tasks'));
	}


	
}
