@extends('layouts.sb_admin')
@section('content')
<style>
    .small{
        font-size: 65%;
    }
    .msjedstatement-desc{
        width: 100px;
        height: 50px;
    }
    .font-bold{
        font-weight: 900;
    }
</style>
<a class="p-4" href="#" data-toggle="modal" data-target="#addNewMsjedstatement">+ {{__('new')}}</a>
<center class="font-bold">الرصيد: {{$msjedstatements->sum('amount')}}</center>
<div class="card mt-3">
    <div class="card-body">
        @foreach($msjedstatements as $msjedstatement)
            <div class="float-left small">
                {{$msjedstatement->created_at->diffForHumans()}}
                <div><i>بواسطة: {{$msjedstatement->user->name}}</i></div>
            </div>

            <div>
                {{abs($msjedstatement->amount)}} 
                <small>{{__($msjedstatement->status)}}</small>
                <div class="msjedstatement-desc small"><small>{{$msjedstatement->description}}</small></div>
            </div>
           
            <a class="btn-circle btn-danger btn-sm small"  href="{{route('msjedstatement.delete',$msjedstatement->id)}}">
                {{__('delete')}}
            </a>
            <a class="btn-circle btn-warning btn-sm small"  href="{{route('msjedstatement.edit',$msjedstatement->id)}}">
                {{__('edit')}}
            </a>
        <hr>
        @endforeach
        
    </div>
</div>

    <!-- create new  Modal-->
    @include('sb-admin.msjedstatement._create')



@endsection