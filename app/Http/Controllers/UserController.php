<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
 

    public function __construct() {
        $this->middleware('auth');
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
            'password'=>Hash::make($request->email)
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
        $teachers = User::where('userType','teacher')->get();
        return view('user.teacher.create',compact('teachers'));
    }

    public function teacherStore(Request $request)
    {
        $loggedUser = auth()->user();
        User::create([
            'name'=>$request->name,
            'userType'=>'teacher',
            'email'=>$request->email,
            'parent'=>$loggedUser->id,
            'password'=>Hash::make($request->email)
        ]);
        return redirect()->back()->with(['status'=>'success','message'=>'done']);
    }

    

 
    public function show($id)
    {
    }

  
    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

   
    public function destroy($id)
    {
    }
}
