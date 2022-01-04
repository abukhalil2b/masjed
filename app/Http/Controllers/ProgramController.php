<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Program;
use App\Models\Student;
use Illuminate\Http\Request;
use DB;
class ProgramController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $programs = Program::all();
        return view('sb-admin.program.index',compact('programs'));
    }

  
    public function create()
    {
        return view('sb-admin.program.create');
    }

  
    public function store(Request $request)
    {
        $loggedUser = auth()->user();
        $request['user_id']=$loggedUser->id;
        Program::create($request->all());
        return redirect()->route('program.index')
        ->with(['status'=>'success','message'=>'تم']);
    }

  
    public function edit(Program $program)
    {
        return view('sb-admin.program.edit',compact('program'));
    }


    public function update(Request $request, Program $program)
    {
        $program->update($request->all());
        return redirect()->back()->with(['status'=>'success','message'=>'تم']);
    }

  
    public function destroy(Program $program)
    {
        DB::table('program_student')->where('program_id',$program->id)->delete();
        $programTaskIds = DB::table('program_task')->where('program_id',$program->id)->pluck('id');
        DB::table('marks')->whereIn('program_task_id',$programTaskIds)->delete();
        DB::table('program_task')->where('program_id',$program->id)->delete();
        DB::table('user_has_program')->where('program_id',$program->id)->delete();
        $program->delete();
        return redirect()->back()->with(['status'=>'success','message'=>'تم']);
    }

    public function show(Program $program)
    {
        return view('sb-admin.program.show',compact('program'));
    }


    public function programStudentCreate(Program $program)
    {   
        $loggedUser = auth()->user();
        $programStudents = Student::whereHas('programs',function($q)use($program){$q->where('program_student.program_id',$program->id);})->get();
        $students = Student::where('user_id',$loggedUser->id)
        ->whereDoesntHave('programs',function($q)use($program){$q->where('program_student.program_id',$program->id);})
        ->get();
        return view('sb-admin.program.student.create',compact('program','students','programStudents'));
    }

    public function programStudentStore(Request $request,Program $program)
    {

        if($request->studentIds){
            $program->students()->attach($request->studentIds);
            return redirect()->back()->with(['status'=>'success','message'=>'تم']);
        }
        abort(404);
    }

    public function programTaskCreate(Program $program)
    {   
        $programTasks = Task::whereHas('programs',function($q)use($program){$q->where('program_task.program_id',$program->id);})->get();
        $tasks = Task::whereDoesntHave('programs',function($q)use($program){$q->where('program_task.program_id',$program->id);})->get();
        return view('sb-admin.program.task.create',compact('program','tasks','programTasks'));
    }

    public function programTaskStore(Request $request,Program $program)
    {
        if($request->taskIds){
            $program->tasks()->attach($request->taskIds);
            return redirect()->back()->with(['status'=>'success','message'=>'تم']);
        }
        abort(404);
    }

}
