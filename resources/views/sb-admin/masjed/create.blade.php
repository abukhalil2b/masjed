@extends('layouts.sb_admin')
@section('content')
	<form method="post" action="{{route('user.masjed.store')}}">
	    @csrf
	    <div class="mt-3">
	        {{__('name')}}
	        <input name="name" class="form-control" placeholder="{{__('name')}}">
	    </div>
	    <div class="mt-3">
	        {{__('email')}}
	        <input name="email" class="form-control" placeholder="{{__('email')}}">
	    </div>
	    <div class="mt-3">
	        كلمة المرور ستكون نفس {{__('email')}}
	        <button class="btn btn-info btn-block">حفظ</button>
	    </div>
	</form>
@endsection