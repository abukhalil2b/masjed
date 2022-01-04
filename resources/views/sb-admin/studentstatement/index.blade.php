@extends('layouts.sb_admin')
@section('content')

<h3>{{__('studentstatement')}}</h3>
<a class="p-4" href="#" data-toggle="modal" data-target="#addNewStudentstatement">+ {{__('new')}}</a>
<center class="font-bold">الرصيد: {{$studentstatements->sum('amount')}}</center>
<div class="card mt-3">
    <div class="card-body">
        @foreach($studentstatements as $studentstatement)
            <div class="float-left small">
                {{$studentstatement->created_at->diffForHumans()}}
                <div><i>بواسطة: {{$studentstatement->user->name}}</i></div>
            </div>

            <div>
                {{abs($studentstatement->amount)}} 
                <small>{{__($studentstatement->status)}}</small>
                <div class="studentstatement-desc small"><small>{{$studentstatement->description}}</small></div>
            </div>
           
            <a class="btn-circle btn-danger btn-sm small"  href="{{route('studentstatement.delete',$studentstatement->id)}}">
                {{__('delete')}}
            </a>
            <a class="btn-circle btn-warning btn-sm small"  href="{{route('studentstatement.edit',$studentstatement->id)}}">
                {{__('edit')}}
            </a>
        <hr>
        @endforeach
        
    </div>
</div>

<!-- create new  Modal-->
@include('sb-admin.studentstatement._create')


@endsection