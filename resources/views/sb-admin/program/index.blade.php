@extends('layouts.sb_admin')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>{{__('title')}}</th>
                            <th>يبدأ:</th>
                            <th>ينتهي:</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>{{__('title')}}</th>
                            <th>يبدأ:</th>
                            <th>ينتهي:</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                         @foreach($programs as $program)
                        <tr>
                            <td>
                                <a href="{{route('program.show',$program->id)}}">{{$program->title}}</a>
                            </td>
                            <td>{{$program->start_at}}</td>
                            <td>{{$program->end_at}}</td>
                            <td>
                                 <a class="btn btn-secondary btn-circle btn-sm" id="dropdownMenuButton" data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" >
                                   <i class="fas fa-fw fa-ellipsis-h"></i>
                                 </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                   
                                    <a class="dropdown-item" href="{{route('program.task.create',$program->id)}}">إضافة {{__('task')}}</a>
                                    <a class="dropdown-item" href="{{route('program.student.create',$program->id)}}">إضافة {{__('student')}}</a>
                                    <a class="dropdown-item" href="{{route('program.transfer.create',$program->id)}}">{{__('transfer')}}</a>
                                    <a class="dropdown-item" href="{{route('program.edit',$program->id)}}">{{__('edit')}}</a>
                                    <a class="dropdown-item"onclick="return confirm('هل متأكد؟')" href="{{route('program.destroy',$program->id)}}">{{__('delete')}}</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection