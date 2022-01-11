@extends('layouts.sb_admin')
@section('content')
<form action="{{route('msjedstatement.update',$msjedstatement->id)}}" method="post">
    @csrf
    <div>
        <div class="my-1">{{__('description')}}</div>
        <input name="description" class="form-control" value="{{$msjedstatement->description}}">
    </div>
    <div class="mt-3">
        <div class="my-1">{{__('amount')}}</div>
        <input pattern="^\d*(\.\d{0,2})?$" step="2" name="amount" value="{{abs($msjedstatement->amount)}}" class="form-control">
        
    </div>
    <div class="mt-3">
        <div class="my-1">{{__('status')}}</div>
        <select name="status" class="form-control p-0">
            <option value="in" @if($msjedstatement->status=='in') selected @endif >{{__('in')}}</option>
            <option value="out" @if($msjedstatement->status=='out') selected @endif >{{__('out')}}</option>
        </select>
    </div>
    <button class="btn text-primary mt-3 float-left">{{__('Save')}}</button>
</form>
@endsection