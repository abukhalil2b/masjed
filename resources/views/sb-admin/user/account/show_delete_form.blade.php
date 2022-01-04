@extends('layouts.sb_admin')
@section('content')
<h6>
    <a href="{{route('useraccount.confirm_user_disable',['user'=>$user->id])}}">
    	{{__('disable')}} {{$user->name}}
    </a>
</h6>

@foreach(json_decode($user->accounts) as $account)
<h6>
	<a href="{{route('useraccount.confirm_account_delete',['user'=>$user->id,'account'=>$account])}}">
		{{__('delete')}} {{__('account')}} {{__($account)}}		
	</a>
</h6>
@endforeach


@endsection
