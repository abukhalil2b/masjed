@extends('layouts.sb_admin')
@section('content')
<div class="card card-body">
     <h5>{{$program->title}}</h5>
    <div>يبدأ: {{$program->start_at}} ينتهي: {{$program->end_at}}</div>
</div>
     <h5>الطلاب المشاركون</h5>
    @foreach($program->students as $student)
    <div>
     {{$student->name}}
    </div>
    @endforeach

    <h5>المهام</h5>
    @foreach($program->tasks as $task)
    <div>
     {{$task->title}}
    </div>
    @endforeach
@endsection
