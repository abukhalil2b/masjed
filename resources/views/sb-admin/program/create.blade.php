@extends('layouts.sb_admin')
@section('content')
<form method="post" action="{{route('program.store')}}">
	@csrf
	<div class="mt-3">
		{{__('title')}}<input name="title" class="form-control" >
	</div>

	<div class="mt-3">
		{{__('start_at')}}<input type="date" name="start_at" class="form-control">
	</div>

    <div class="mt-3">
    	{{__('end_at')}}<input type="date" name="end_at" class="form-control">
    </div>   

    <button class="btn btn-info btn-block mt-5">حفظ</button>       
</form>
@endsection
