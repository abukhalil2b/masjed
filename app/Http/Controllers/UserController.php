<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Wakeel;
use Illuminate\Support\Facades\Hash;
use DB;
class UserController extends Controller
{
 

    public function __construct() {
        $this->middleware('auth');
    }

    public function userIndex()
    {
        $loggedUser = auth()->user();
        if($loggedUser->id==1){
            $users = User::all();
        }else{
           $users = User::where('parent',$loggedUser->id)->get(); 
        }
        return view('sb-admin.user.index',compact('users'));
    }
    
    public function masjedEdit(User $masjed)
    {
        return view('sb-admin.masjed.edit',compact('masjed'));
    }

    public function masjedShow(User $masjed)
    {
        $masjedAmountInSum = $masjed->msjedstatements->where('status','in')->sum('amount');
        $masjedAmountOutSum = $masjed->msjedstatements->where('status','out')->sum('amount');
        $masjedTotalAmount = $masjedAmountInSum - $masjedAmountOutSum;
        return view('sb-admin.masjed.show',compact('masjed','masjedAmountInSum','masjedAmountOutSum','masjedTotalAmount'));
    }
    
    public function masjedIndex()
    {
        $masjeds = User::where('userType','masjed')->get();
        return view('sb-admin.masjed.index',compact('masjeds'));
    }

    public function masjedCreate()
    {
        return view('sb-admin.masjed.create');
    }

    public function masjedStore(Request $request)
    {
        User::create([
            'name'=>$request->name,
            'userType'=>'masjed',
            'email'=>$request->email,
            'password'=>Hash::make($request->email),
            'accounts'=>'["masjed"]'
        ]);
        return redirect()->route('dashboard')->with(['status'=>'success','message'=>'تم']);
    }

    public function masjedUpdate(Request $request,User $masjed)
    {
        $masjed->update($request->all());
        return redirect()->route('dashboard')->with(['status'=>'success','message'=>'تم']);
    }


    //teacher

    public function teacherDashboard()
    {
        return view('user.teacher.dashboard');
    }


    public function teacherCreate()
    {
        $loggedUser = auth()->user();
        $users = User::where('parent',$loggedUser->id)
        ->where(function($q){
            $q->whereJsonDoesntContain('accounts','teacher')
            ->orWhere('accounts',NULL);
        })
        ->get();
        return view('sb-admin.teacher.create',compact('users'));
    }

    public function teacherNewCreate()
    {
        return view('sb-admin.teacher.new.create');
    }

    public function teacherStore(Request $request)
    {
        // return $request->all();
        $loggedUser = auth()->user();
        $request->validate(['user_id'=>'required']);
       
        $owner = User::findOrFail($request->user_id);

        if($owner->accounts){
            $accountsEnc = json_decode($owner->accounts);
            $available = in_array('teacher', $accountsEnc);
            if($available){
                abort(401,'الحساب موجود مسبقا');
            }
            array_push($accountsEnc,'teacher');
            $accounts = json_encode($accountsEnc);
        }else{
            $accounts = '["teacher"]';
        }
        
        $owner->accounts = $accounts;
        $owner->userType = 'teacher';
        $owner->save();
        Teacher::create(['owner'=>$owner->id]);
        $this->grantStudentstatementPermission($owner);
        return redirect()->route('user.index')->with(['status'=>'success','message'=>'تم']);
    }

    public function teacherNewStore(Request $request)
    {

        $request->validate(['name'=>'required','email'=>'required|unique:users']);
        $loggedUser = auth()->user();
        $owner = User::create([
            'name'=>$request->name,
            'userType'=>'teacher',
            'email'=>$request->email,
            'parent'=>$loggedUser->id,
            'password'=>Hash::make($request->email),
            'accounts'=>'["teacher"]'
        ]);
        Teacher::create(['owner'=>$owner->id]);
        $this->grantStudentstatementPermission($owner);
        return redirect()->route('user.index')
        ->with(['status'=>'success','message'=>'تم']);
    }

    
    public function wakeelCreate()
    {
        $loggedUser = auth()->user();
        $users = User::where('parent',$loggedUser->id)
        ->where(function($q){
            $q->whereJsonDoesntContain('accounts','wakeel')
            ->orWhere('accounts',NULL);
        })
        ->get();
        return view('sb-admin.wakeel.create',compact('users'));
    }

    public function wakeelNewCreate()
    {
        return view('sb-admin.wakeel.new.create');
    }

    public function wakeelStore(Request $request)
    {
        // return $request->all();
        $loggedUser = auth()->user();
        $request->validate(['user_id'=>'required']);
       
        $owner = User::findOrFail($request->user_id);

        if($owner->accounts){
            $accountsEnc = json_decode($owner->accounts);
            $available = in_array('wakeel', $accountsEnc);
            if($available){
                abort(401,'الحساب موجود مسبقا');
            }
            array_push($accountsEnc,'wakeel');
            $accounts = json_encode($accountsEnc);
        }else{
            $accounts = '["wakeel"]';
        }
        
        $owner->accounts = $accounts;
        $owner->userType = 'wakeel';
        $owner->save();

        Wakeel::create(['owner'=>$owner->id]);
        $this->grantMsjedstatementPermission($owner);
        return redirect()->route('user.index')->with(['status'=>'success','message'=>'تم']);
    }

    public function wakeelNewStore(Request $request)
    {
        
        $request->validate(['name'=>'required','email'=>'required|unique:users']);
        $loggedUser = auth()->user();

        $owner = User::create([
            'name'=>$request->name,
            'userType'=>'wakeel',
            'email'=>$request->email,
            'parent'=>$loggedUser->id,
            'password'=>Hash::make($request->email),
            'accounts'=>'["wakeel"]'
        ]);

        Wakeel::create(['owner'=>$owner->id]);

        $this->grantMsjedstatementPermission($owner);
        return redirect()->route('user.index')
        ->with(['status'=>'success','message'=>'تم']);
    }

       
    public function accountIndex()
    {
        $loggedUser = auth()->user();
        $users = User::where('parent',$loggedUser->id)
        ->get();
        return view('sb-admin.user.account.index',compact('users'));
    }
    
    protected function grantMsjedstatementPermission($owner){
        $msjedstatementPermissionIds = Permission::whereCate('msjedstatement')->pluck('id');
        $owner->permissions()->attach($msjedstatementPermissionIds);
    }

    protected function grantStudentstatementPermission($owner){
        $studentstatementPermissionIds = Permission::whereCate('studentstatement')->pluck('id');
        $owner->permissions()->attach($studentstatementPermissionIds);
    }

    protected function deleteElementFromArray($arr,$elemt){
        if(!is_array($arr)){
            abort(500);
        }
        
        $tmpArr=[];
        foreach($arr as $val){
            if($val!==$elemt)
                array_push($tmpArr, $val);
        }
        return($tmpArr);
    }
    //delete accounts

    public function useraccountShowDeleteFrom(User $user)
    {
        $loggedUser = auth()->user();
        $loggedUser->checkUserHasUserPermission($user);
        return view('sb-admin.user.account.show_delete_form',compact('user'));
    }

    public function useraccountConfirmUserDisable(User $user)
    {
        
        $loggedUser = auth()->user();
        $loggedUser->checkUserHasUserPermission($user);
        $user->deactive();
        return redirect()->route('user.index')
        ->with(['status'=>'success','message'=>'تم']);
    }

    public function useraccountConfirmUserEnable(User $user)
    {
        
        $loggedUser = auth()->user();
        $loggedUser->checkUserHasUserPermission($user);
        $user->active();
        return redirect()->route('user.index')
        ->with(['status'=>'success','message'=>'تم']);
    }


    public function useraccountConfirmAccountDelete(User $user,$account)
    {


        // ---
        $loggedUser = auth()->user();
        $loggedUser->checkUserHasUserPermission($user);

        if($account=='teacher'){
            Teacher::whereOwner($user->id)->delete();
            $ids = Permission::whereCate('studentstatement')->pluck('id');
            DB::table('user_permission')->whereIn('permission_id',$ids)
            ->where('user_id',$user->id)
            ->delete();
        }

        if($account=='wakeel'){
            Wakeel::whereOwner($user->id)->delete();
            $ids = Permission::whereCate('msjedstatement')->pluck('id');
            DB::table('user_permission')->whereIn('permission_id',$ids)
            ->where('user_id',$user->id)
            ->delete();
        }

        $user->accounts = json_encode($this->deleteElementFromArray(json_decode($user->accounts),$account));
        
        $user->save();
        return redirect()->route('user.index')
        ->with(['status'=>'success','message'=>'تم']);
    }

    //shiftToAccount 
    public function shiftToAccount($account)
    {
        $loggedUser = auth()->user();
        $loggedUser->userType=$account;
        $loggedUser->save();
        return back()
        ->with(['status'=>'success','message'=>'تم']);
    }

    //profile 
    public function userProfile()
    {
        $loggedUser = auth()->user();
        return view('sb-admin.user.profile',compact('loggedUser'));
    }

    //updatePassword 
    public function updatePassword(Request $request)
    {
        $loggedUser = auth()->user();
        $loggedUser->password = Hash::make($request->password);
        $loggedUser->save();
        return back()->with(['status'=>'success','message'=>'تم']);
    }
    

}
