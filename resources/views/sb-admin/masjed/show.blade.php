@extends('layouts.sb_admin')
@section('content')
<h4>{{$masjed->name}}</h4>
<div>
	{{__('email')}}: {{$masjed->email}}
</div>

<h4 class="mt-3">عدد البرامج التعليمية</h4>
{{$masjed->programs->count()}}
<h4 class="mt-3">عدد الطلاب </h4>
{{$masjed->students->count()}}
<h4 class="mt-3">رصيد الطلاب</h4>

<h4 class="mt-3">رصيد المسجد</h4>
<div>مجموع الدخل: {{$masjedAmountInSum}}</div>
<div>مجموع المصروفات: {{$masjedAmountOutSum}}</div>
<div>المجموع: {{$masjedTotalAmount}}</div>


@endsection
