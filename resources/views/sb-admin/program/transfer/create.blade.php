@extends('layouts.sb_admin')
@section('content')
<form method="post" action="{{route('program.transfer.store',$program->id)}}">
	@csrf
	<div class="mt-3">
		<select name="user_id" class="form-control">
			@foreach($users as $user)
			<option value="{{$user->id}}">{{$user->name}}</option>
			@endforeach
		</select>
	</div>
    <button class="btn btn-info btn-block mt-5">حفظ</button>       
</form>
@endsection
