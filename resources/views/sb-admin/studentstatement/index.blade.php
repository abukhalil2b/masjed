@extends('layouts.sb_admin')
@section('content')

<h3>{{__('studentstatement')}}</h3>

@if(auth()->user()->canPermission('manage_studentstatement'))
<a class="p-4" href="#" data-toggle="modal" data-target="#addNewStudentstatement">+ {{__('new')}}</a>
@endif

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
           
            @if(auth()->user()->canPermission('manage_studentstatement'))
                <div  id="dropdownMenuButton{{$studentstatement->id}}" data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" class="text-left">
                    <i class="fas fa-fw fa-edit"></i>
                </div>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{$studentstatement->id}}">
                    <a href="{{route('studentstatement.edit',$studentstatement->id)}}" class="dropdown-item" >
                        {{__('edit')}}
                    </a>
                    <a class="dropdown-item" onclick="return confirm('هل متأكد؟')" href="{{route('studentstatement.delete',$studentstatement->id)}}">
                        {{__('delete')}}
                    </a>
                </div>
            @endif
        <hr>
        @endforeach
        
    </div>
</div>

<!-- create new  Modal-->
@include('sb-admin.studentstatement._create')


@endsection