@extends('layouts.sb_admin')
@section('content')

<h3>{{__('msjedstatement')}}</h3>
<a class="p-4" href="#" data-toggle="modal" data-target="#addNewMsjedstatement">+ {{__('new')}}</a>
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
                <div class="msjedstatement-desc small"><small>{{$msjedstatement->description}}</small></div>
            </div>
           
        
        <div  id="dropdownMenuButton" data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" class="text-left">
            <i class="fas fa-fw fa-edit"></i>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{route('msjedstatement.edit',$msjedstatement->id)}}">
                    {{__('edit')}}
                </a>
                <a class="dropdown-item"onclick="return confirm('هل متأكد؟')" href="{{route('msjedstatement.delete',$msjedstatement->id)}}">
                    {{__('delete')}}
                </a>
            </div>
        </div>
        <hr>
        @endforeach
        
    </div>
</div>

    <!-- create new  Modal-->
    @include('sb-admin.msjedstatement._create')



@endsection