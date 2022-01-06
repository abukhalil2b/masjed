<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    public function __construct() {
        $this->middleware(['auth','superadmin']);
    }
    
    public function index(User $user)
    {
        $msjedstatements = Permission::whereCate('msjedstatement')->get();
        $studentstatements = Permission::whereCate('studentstatement')->get();
        $programs = Permission::whereCate('program')->get();
        $tasks = Permission::whereCate('task')->get();
        $students = Permission::whereCate('student')->get();
        $teachers = Permission::whereCate('teacher')->get();
        $wakeels = Permission::whereCate('wakeel')->get();
        $accounts = Permission::whereCate('account')->get();
        return view('sb-admin.user.permission.index',compact(
            'msjedstatements',
            'studentstatements',
            'programs',
            'tasks',
            'students',
            'teachers',
            'wakeels',
            'accounts',
            'user'
        ));
    }

    public function update(Request $request, User $user)
    {

        // return $request->all();
        $permission_ids = $request->permission_ids;
        if($permission_ids){
            $user->permissions()->sync($permission_ids);
        }else{
           $user->permissions()->detach(); 
        }
        return back()->with(['status'=>'success','message'=>'تم']);
        
    }

    
}
