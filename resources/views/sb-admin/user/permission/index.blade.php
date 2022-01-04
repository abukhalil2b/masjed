@extends('layouts.sb_admin')
@section('content')


    <form action="{{route('user.permissions.update',$user->id)}}" method="post">
        @csrf

        
        <h5 class="box p-1 m-1">صلاحيات: {{$user->name}}</h5>
        <div class="box p-1 m-1 text-primary">{{__('msjedstatement')}}</div>
        @foreach($msjedstatements as $permission)
            <div class="p-1">
                <input 
                    {{$user->canPermission($permission->slug)?'checked':''}} 
                    type="checkbox" 
                    name="permission_ids[]" value="{{$permission->id}}">
                {{__($permission->title)}}
            </div>
        @endforeach

       <div class="box p-1 m-1 text-primary">{{__('studentstatement')}}</div>
        @foreach($studentstatements as $permission)
            <div class="p-1">
                <input 
                    {{$user->canPermission($permission->slug)?'checked':''}} 
                    type="checkbox" 
                    name="permission_ids[]" value="{{$permission->id}}">
                {{__($permission->title)}}
            </div>
        @endforeach

        <div class="box p-1 m-1 text-primary">{{__('programs')}}</div>
        @foreach($programs as $permission)
            <div class="p-1">
                <input 
                    {{$user->canPermission($permission->slug)?'checked':''}} 
                    type="checkbox" 
                    name="permission_ids[]" value="{{$permission->id}}">
                {{__($permission->title)}}
            </div>
        @endforeach

        <div class="box p-1 m-1 text-primary">{{__('task')}}</div>
        @foreach($tasks as $permission)
            <div class="p-1">
                <input 
                    {{$user->canPermission($permission->slug)?'checked':''}} 
                    type="checkbox" 
                    name="permission_ids[]" value="{{$permission->id}}">
                {{__($permission->title)}}
            </div>
        @endforeach

        <div class="box p-1 m-1 text-primary">{{__('student')}}</div>
        @foreach($students as $permission)
            <div class="p-1">
                <input 
                    {{$user->canPermission($permission->slug)?'checked':''}} 
                    type="checkbox" 
                    name="permission_ids[]" value="{{$permission->id}}">
                {{__($permission->title)}}
            </div>
        @endforeach

        <div class="box p-1 m-1 text-primary">{{__('account')}}</div>
        @foreach($accounts as $permission)
            <div class="p-1">
                <input 
                    {{$user->canPermission($permission->slug)?'checked':''}} 
                    type="checkbox" 
                    name="permission_ids[]" value="{{$permission->id}}">
                {{__($permission->title)}}
            </div>
        @endforeach
        <button class="btn btn-block btn-outline-secondary mt-5" type="submit">حفظ</button>
    </form>

@endsection