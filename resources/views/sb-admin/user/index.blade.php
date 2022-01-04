@extends('layouts.sb_admin')
@section('content')


@if(count($users))

@foreach($users as $user)
	<div class="card mb-4 p-2 border-bottom-primary shadow mt-1">

		<div class="flex">
			<img class="rounded" src="{{asset('img/avatar/avatar.png')}}" alt="" width="40">
			<h4 class="mr-2">
				{{$user->name}}
			</h4>
		</div>

		@if($user->parentUser)
		<small>مستخدم يتبع: {{$user->parentUser->name}}</small>
		@endif

		@if(!$user->isActive())
			<a href="{{route('useraccount.confirm_user_enable',['user'=>$user->id])}}">
	    		{{__('enable')}} {{$user->name}}
	    	</a>
		@else
			<h4>
				<small>
					<i class="fas fa-fw fa-user"></i>
					اسم المستخدم: {{$user->email}}
				</small>
			</h4>
			<div>
				@if($user->accounts)
				<div class="small">
					{{__('accounts')}}: 
					@foreach(json_decode($user->accounts) as $account)
					<div class="mr-2 badge badge-primary badge-counter p-1">{{__($account)}}</div>
					@endforeach
				</div>
				@else
				هذا المستخدم غير مرتبط بأي حساب 
				@endif
				
				<div class="small mt-3">
					{{__('permissions')}}: 
					@foreach($user->permissions as $permission)
					<div class="mr-2 badge badge-primary badge-counter p-1">{{$permission->title}}</div>
					@endforeach
				</div>
			</div>	
			<div  class="text-left">
				<a href="{{route('useraccount.show_delete_form',$user->id)}}" style="color:#e91e63">
					حذف
				</a>
			</div>
		@endif

	</div>
@endforeach



@endif

@endsection
