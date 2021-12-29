@extends('layouts.sb_admin')
@section('content')

<h4>{{$student->name}}</h4>

<h6>{{__('programs')}}</h6>

@foreach($student->programs as $program)
<div class="card card-body">
	{{$program->title}}
</div>
@endforeach


@endsection
