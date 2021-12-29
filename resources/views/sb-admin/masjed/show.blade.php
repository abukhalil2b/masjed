@extends('layouts.sb_admin')
@section('content')
<h4>{{$masjed->name}}</h4>
<div>
	{{__('email')}}: {{$masjed->email}}
</div>

@endsection
