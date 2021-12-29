@extends('layouts.sb_admin')
@section('content')
<div class="container">
	<form action="{{route('user.masjed.update',['masjed'=>$masjed->id])}}" method="post">
		@csrf
    <div class="row justify-content-center">
        <div class="col-md-12">
			<div>
				<input value="{{$masjed->name}}" name="name" class="form-control">
			</div>
			<div>
				{{__('email')}}:{{$masjed->email}}
			</div>
		</div>
		<div class="col-md-12">
			<button class="btn btn-warning btn-block mt-5">تعديل</button>
		</div>
    </div>
    </form>
</div>
@endsection