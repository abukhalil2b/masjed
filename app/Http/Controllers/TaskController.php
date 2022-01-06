<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $tasks = Task::all();
        return view('sb-admin.task.index',compact('tasks'));
    }

  
    public function create()
    {
        return view('sb-admin.task.create');
    }

  
    public function store(Request $request)
    {
        Task::create($request->all());
        return redirect()->route('task.index')->with(['status'=>'success','message'=>'تم']);
    }

    

  
    public function edit(Task $task)
    {
        return view('sb-admin.task.edit',compact('task'));
    }


    public function update(Request $request, Task $task)
    {
        $task->update($request->all());
        return redirect()->back()->with(['status'=>'success','message'=>'تم']);
    }

  
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->back()->with(['status'=>'success','message'=>'تم']);
    }

    public function show(Task $task)
    {
        return view('sb-admin.task.show',compact('task'));
    }




}
