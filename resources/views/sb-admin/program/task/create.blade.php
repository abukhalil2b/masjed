@extends('layouts.sb_admin')
@section('content')

<form action="{{route('program.task.store',['program'=>$program->id])}}" method="post">
@csrf
    
@if(count($tasks))
    <center>قائمة المهام المسجلة في النظام</center>
   @foreach($tasks as $task)
    <div class="bar">
        <input type="checkbox" name="taskIds[]" value="{{$task->id}}" >
        {{$task->title}}
        <span class="pull-left">{{__('maxpoint')}} {{$task->maxpoint}}</span>
        <div class="small">
            {{$task->description}}
        </div>
    </div>
    @endforeach
    <button class="btn btn-block btn-outline-secondary mt-1">اضافة المهام التي إخترتها في البرنامج </button>
@else
<center>لايوجد مهام</center>
@endif

</form>  


@if(count($programTasks))

    <center>قائمة المهام المسندة إلى طلاب برنامج  {{$program->title}}</center>
    @foreach($programTasks as $task)
    <div class="bar">
        {{$task->title}}
        <span class="pull-left">{{__('maxpoint')}} {{$task->maxpoint}}</span>
        <div>
            <small>
                {{$task->description}}
            </small>
        </div>
    </div>
    @endforeach

 @endif
    
@endsection