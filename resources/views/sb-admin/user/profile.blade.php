@extends('layouts.sb_admin')
@section('content')

<div >
	{{__('accounts')}}
</div>
@foreach(json_decode(auth()->user()->accounts) as $account)
@if(auth()->user()->userType==$account)
	<span class="btn btn-success">{{__($account)}}</span>
@else
	<a href="{{Route('user.shift_to_account',['account'=>$account])}}" class="btn btn-secondary">{{__($account)}}</a>
@endif
@endforeach
<hr>
<form method="post" action="{{route('user.update_password')}}"> 
	@csrf
	{{__('password')}}
	<input name="password" class="form-control">
	<button class="btn  btn-block btn-secondary mt-5">{{__('edit')}}</button>
</form>
@endsection
