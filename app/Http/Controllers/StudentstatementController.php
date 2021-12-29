<?php

namespace App\Http\Controllers;

use App\Models\Studentstatement;
use Illuminate\Http\Request;

class StudentstatementController extends Controller
{
    public function index()
    {
        $loggedUser = Auth()->user();
        $studentstatements = Studentstatement::where('user_id',$loggedUser->id)->get();
        return view('studentstatement.index',compact('studentstatements'));
    }

  
    public function create()
    {   
        $loggedUser = Auth()->user();
        $studentstatements = Studentstatement::where('user_id',$loggedUser->id)->get();
        return view('studentstatement.create',compact('studentstatements'));
    }

  
    public function store(Request $request)
    {
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
        return view('studentstatement.edit',compact('studentstatement'));
    }


    public function update(Request $request, Studentstatement $studentstatement)
    {
        $studentstatement->update($request->all());
        return redirect()->back()->with(['status'=>'success','message'=>'تم']);
    }

  
    public function destroy(Studentstatement $studentstatement)
    {
        $studentstatement->delete();
        return redirect()->back()->with(['status'=>'success','message'=>'تم']);
    }
}
