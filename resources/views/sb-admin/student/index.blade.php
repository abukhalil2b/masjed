@extends('layouts.sb_admin')
@section('content')

     @foreach($students as $student)
     <a href="{{route('student.show',$student->id)}}" class="card card-body"> 
          
          <div >
               <h4>{{$student->name}}</h4>
               <small>الهاتف:{{$student->phone}}</small>
               <div>{{__($student->gender)}}</div>
               <div>سنة الميلاد: {{$student->birthday}}</div>
          </div>

     </a>
     @endforeach

@endsection

