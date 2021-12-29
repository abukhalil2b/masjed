@extends('layouts.sb_admin')
@section('content')
    <center >
        قائمة المهام المسجلة في النظام
    </center>
    @foreach($tasks as $task)
    <div class="card-body bar">
        {{$task->title}} <span class="pull-left">{{__('maxpoint')}} {{$task->maxpoint}}</span>
         <div><small>{{$task->description}}</small></div>
    </div>
    @endforeach
@endsection