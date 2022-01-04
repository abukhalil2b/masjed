@extends('layouts.sb_admin')
@section('content')

<h6>
    اضافة حساب {{__('wakeel')}} جديد
</h6>


<form method="post" action="{{route('user.wakeel.new.store')}}">
    @csrf
    <div class="mt-3">
        {{__('name')}}
        <input name="name" class="form-control" >
    </div>
    <div class="mt-3">
        {{__('email')}}
        <input name="email" class="form-control" >
    </div>
    <div class="mt-3">
        كلمة المرور ستكون نفس {{__('email')}}
        <button class="btn btn-info btn-block">حفظ</button>
    </div>
</form>


@endsection
