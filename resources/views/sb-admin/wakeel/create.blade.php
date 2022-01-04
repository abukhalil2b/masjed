@extends('layouts.sb_admin')
@section('content')

<h6>
    اضافة حساب {{__('wakeel')}}  لـ {{__('user')}} موجود في النظام
    <a href="{{route('user.wakeel.new.create')}}">
        أو (مستخدم جديد)
    </a>
</h6>

@if(count($users))

<form method="post" action="{{route('user.wakeel.store')}}">
    @csrf
    اختر {{__('user')}}
    <select name="user_id" class="form-control mt-1">
        @foreach($users as $user)
        <option value="{{$user->id}}">
            {{$user->name}}
        </option>
        @endforeach
    </select>
    <button class="btn btn-info btn-block mt-5">حفظ</button>
</form>


@endif


@endsection
