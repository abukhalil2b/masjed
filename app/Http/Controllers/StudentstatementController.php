<?php

namespace App\Http\Controllers;

use App\Models\Studentstatement;
use Illuminate\Http\Request;

class StudentstatementController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $loggedUser = Auth()->user();
        $studentstatements = Studentstatement::where('user_id',$loggedUser->id)
        ->orderby('id','desc')
        ->get();
        return view('sb-admin.studentstatement.index',compact('studentstatements'));
    }

  
    public function store(Request $request)
    {
        // return $request->all();
        $loggedUser = Auth()->user();
        $request['user_id'] = $loggedUser->id;
        if($request->status=='out'){
            $amount = $request->amount * -1;
            $request['amount'] = $amount;
        }
        Studentstatement::create($request->all());
        return redirect()->back()->with(['status'=>'success','message'=>'تم']);
    }

    public function edit(Studentstatement $studentstatement)
    {
        return view('sb-admin.studentstatement.edit',compact('studentstatement'));
    }
    public function update(Request $request, Studentstatement $studentstatement)
    {
        if($request->status=='out'){
            $amount = $request->amount * -1;
            $request['amount'] = $amount;
        }
        $studentstatement->update($request->all());
        return redirect()->route('studentstatement.index')->with(['status'=>'success','message'=>'تم']);
    }
  
    public function destroy(Studentstatement $studentstatement)
    {
        $studentstatement->delete();
        return redirect()->back()->with(['status'=>'success','message'=>'تم']);
    }
}
