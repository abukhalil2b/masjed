@extends('layouts.sb_admin')
@section('content')

@if(auth()->user()->canPermission('program_create_edit'))
<div class="p-2">
    <a href="{{route('program.create')}}">+ {{__('new')}}</a>
</div>
@endif

<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>{{__('title')}}</th>
                <th>الفترة</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
             @foreach($programs as $program)
            <tr>
                <td>
                    <a href="{{route('program.show',$program->id)}}">{{$program->title}}</a>
                    <div><small>{{$program->masjed->name}}</small></div>
                </td>
                <td>
                    <small>
                        <div>يبدأ: {{$program->start_at}}</div>
                        <div>ينتهي: {{$program->end_at}}</div>
                    </small>
                </td>
                <td>
                     <a class="btn btn-secondary btn-circle btn-sm" id="dropdownMenuButton" data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" >
                       <i class="fas fa-fw fa-ellipsis-h"></i>
                     </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{route('program.task.create',$program->id)}}">إضافة {{__('task')}}</a>
                        <a class="dropdown-item" href="{{route('program.student.create',$program->id)}}">إضافة {{__('student')}}</a>
                        <a class="dropdown-item" href="{{route('program.edit',$program->id)}}">{{__('edit')}}</a>
                        <a class="dropdown-item"onclick="return confirm('هل متأكد؟')" href="{{route('program.destroy',$program->id)}}">{{__('delete')}}</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection