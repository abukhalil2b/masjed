@extends('layouts.sb_admin')
@section('content')

<h3>{{__('msjedstatement')}}</h3>

@if(auth()->user()->canPermission('manage_msjedstatement'))
<a class="p-4" href="#" data-toggle="modal" data-target="#addNewMsjedstatement">+ {{__('new')}}</a>
@endif

<center><b>الرصيد: {{$msjedstatements->sum('amount')}}</b></center>
<div class="card mt-2">
    <div class="p-1">
        @foreach($msjedstatements as $msjedstatement)
            <div class="text-left small">
                {{$msjedstatement->created_at->diffForHumans()}}
                <div><i>بواسطة: {{$msjedstatement->user->name}}</i></div>
            </div>

            <div>
                {{abs($msjedstatement->amount)}} 
                <small>{{__($msjedstatement->status)}}</small>
                <div class="small"><small>{{$msjedstatement->description}}</small></div>
            </div>
           
        @if(auth()->user()->canPermission('manage_msjedstatement'))
        <div  id="dropdownMenuButton{{$msjedstatement->id}}" data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" class="text-left">
            <i class="fas fa-fw fa-edit"></i>
        </div>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{$msjedstatement->id}}">
            <a href="{{route('msjedstatement.edit',$msjedstatement->id)}}" class="dropdown-item" >
                {{__('edit')}}
            </a>
            <a class="dropdown-item" onclick="return confirm('هل متأكد؟')" href="{{route('msjedstatement.delete',$msjedstatement->id)}}">
                {{__('delete')}}
            </a>
        </div>
        @endif
        <hr>
        @endforeach
        
    </div>
</div>

    <!-- create new  Modal-->
    @include('sb-admin.msjedstatement._create')



@endsection