@extends('layouts.sb_admin')
@section('content')
<form action="{{route('studentstatement.update',$studentstatement->id)}}" method="post">
    @csrf
    <div>
        <div class="my-1">{{__('description')}}</div>
        <input name="description" class="form-control" value="{{$studentstatement->description}}">
    </div>
    <div class="mt-3">
        <div class="my-1">{{__('amount')}}</div>
        <input type="number" name="amount" class="form-control" value="{{abs($studentstatement->amount)}}">
    </div>
    <div class="mt-3">
        <div class="my-1">{{__('status')}}</div>
        <select name="status" class="form-control p-0">
            <option value="in" @if($studentstatement->status=='in') selected @endif >{{__('in')}}</option>
            <option value="out" @if($studentstatement->status=='out') selected @endif >{{__('out')}}</option>
        </select>
    </div>
    <button class="btn text-primary mt-3 float-left">{{__('Save')}}</button>
</form>
@endsection