@extends('layouts.sb_admin')
@section('content')
    
@if(count($students))
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
			<form action="{{route('program.student.store',['program'=>$program->id])}}" method="post">
			@csrf
            <div class="card">
                <div class="card-body">
                <center>قائمة الطلاب المسجلين في النظام</center>
        	   @foreach($students as $student)
                <div>
                    <input type="checkbox" name="studentIds[]" value="{{$student->id}}" >
                    {{$student->name}}
                </div>
                @endforeach
                </div>
            </div>
            
            <button class="btn btn-block btn-outline-secondary mt-1">اضافة الطلاب الذين إخترتهم في البرنامج </button>
            
           </form>
        </div>
    </div>
</div>
@else
<center>لايوجد طلاب</center>
@endif


@if(count($programStudents))

<div class="card">
    <center>قائمة الطلاب المشتركين في برنامج {{$program->title}}</center>
    <div class="card-body">
   @foreach($programStudents as $student)
    <div class="bar">
        {{$student->name}}
        <span class="pull-left">{{__('phone')}} {{$student->phone}}</span>
        <div>
            <small>
                {{$student->yearbirth}}
            </small>
        </div>
    </div>
    @endforeach
    </div>
</div>

@endif

@endsection
