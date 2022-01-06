<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wakeel;
use App\Models\Msjedstatement;
use Illuminate\Http\Request;

class MsjedstatementController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $loggedUser = Auth()->user();
        $msjedstatements = Msjedstatement::whereHas('userHasMsjedstatementPermission',function($query)use($loggedUser){
            if($loggedUser->userType!='masjed'){
                $userId=$loggedUser->parent;
            }else{
                $userId=$loggedUser->id;
            }
            $query->where('user_has_msjedstatement_permission.user_id',$userId);
        })
        ->orderby('id','desc')
        ->get();
        return view('sb-admin.msjedstatement.index',compact('msjedstatements'));
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
        $ms = Msjedstatement::create($request->all());
        if($loggedUser->userType!='masjed'){
            $userId=$loggedUser->parent;
        }else{
            $userId=$loggedUser->id;
        }
        $ms->userHasMsjedstatementPermission()->attach($userId);
        return redirect()->back()->with(['status'=>'success','message'=>'تم']);
    }

    public function edit(Msjedstatement $msjedstatement)
    {
        return view('sb-admin.msjedstatement.edit',compact('msjedstatement'));
    }
    
    public function update(Request $request, Msjedstatement $msjedstatement)
    {
        if($request->status=='out'){
            $amount = $request->amount * -1;
            $request['amount'] = $amount;
        }
        $msjedstatement->update($request->all());
        return redirect()->route('msjedstatement.index')->with(['status'=>'success','message'=>'تم']);
    }
  
    public function destroy(Msjedstatement $msjedstatement)
    {
        $msjedstatement->delete();
        return redirect()->back()->with(['status'=>'success','message'=>'تم']);
    }
}
