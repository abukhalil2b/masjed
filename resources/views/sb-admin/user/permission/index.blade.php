@extends('layouts.sb_admin')
@section('content')


    <form action="{{route('user.permissions.update',$user->id)}}" method="post">
        @csrf

        <div class="box shadow">
        <div class="box-top">صلاحيات: {{$user->name}}</div>
    
        @foreach($msjedstatements as $permission)
            <div class="p-1">
                <input 
                    {{$user->canPermission($permission->slug)?'checked':''}} 
                    type="checkbox" 
                    name="permission_ids[]" value="{{$permission->id}}">
                {{__($permission->title)}}
            </div>
        @endforeach

       
        @foreach($studentstatements as $permission)
            <div class="p-1">
                <input 
                    {{$user->canPermission($permission->slug)?'checked':''}} 
                    type="checkbox" 
                    name="permission_ids[]" value="{{$permission->id}}">
                {{__($permission->title)}}
            </div>
        @endforeach

        @foreach($programs as $permission)
            <div class="p-1">
                <input 
                    {{$user->canPermission($permission->slug)?'checked':''}} 
                    type="checkbox" 
                    name="permission_ids[]" value="{{$permission->id}}">
                {{__($permission->title)}}
            </div>
        @endforeach

        @foreach($tasks as $permission)
            <div class="p-1">
                <input 
                    {{$user->canPermission($permission->slug)?'checked':''}} 
                    type="checkbox" 
                    name="permission_ids[]" value="{{$permission->id}}">
                {{__($permission->title)}}
            </div>
        @endforeach

        @foreach($students as $permission)
            <div class="p-1">
                <input 
                    {{$user->canPermission($permission->slug)?'checked':''}} 
                    type="checkbox" 
                    name="permission_ids[]" value="{{$permission->id}}">
                {{__($permission->title)}}
            </div>
        @endforeach
        </div>
        <button class="btn btn-block btn-outline-secondary mt-5" type="submit">حفظ</button>
    </form>

@endsection