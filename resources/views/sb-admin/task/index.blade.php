@extends('layouts.sb_admin')
@section('content')
<div class="p-2">
    <a href="{{route('task.create')}}">+ {{__('new')}}</a>
</div>
    <center >
        قائمة المهام المسجلة في النظام
    </center>
    @foreach($tasks as $task)
    <div class="">
        {{$task->title}} <span class="pull-left">{{__('maxpoint')}} {{$task->maxpoint}}</span>
        <div>
            <small>{{$task->description}}</small>
        </div>
        <a class="btn btn-circle btn-sm float-left" id="dropdownMenuButton" data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" >
           <i class="fas fa-fw fa-ellipsis-h"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{route('task.edit',$task->id)}}">{{__('edit')}}</a>
        </div>
        <hr>
    </div>
    @endforeach
@endsection