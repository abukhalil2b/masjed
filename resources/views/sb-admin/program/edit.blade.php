@extends('layouts.sb_admin')
@section('content')
<form method="post" action="{{route('program.update',$program->id)}}">
	@csrf
	<div class="mt-3">
		{{__('title')}}<input name="title" class="form-control" value="{{$program->title}}" >
	</div>

	<div class="mt-3">
		{{__('start_at')}}<input type="date" name="start_at" class="form-control" value="{{$program->start_at}}">
	</div>

    <div class="mt-3">
    	{{__('end_at')}}<input type="date" name="end_at" class="form-control" value="{{$program->end_at}}">
    </div>   

    <button class="btn btn-info btn-block mt-5">حفظ</button>       
</form>
@endsection
