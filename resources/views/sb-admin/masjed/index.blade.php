@extends('layouts.sb_admin')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{__('masjeds')}}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>{{__('name')}}</th>
                            <th>{{__('email')}}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>{{__('name')}}</th>
                            <th>{{__('email')}}</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                    	@foreach($masjeds as $masjed)
                        <tr>
                            <td>{{$masjed->name}}</td>
                            <td>{{$masjed->email}}</td>
                            <td>
	                            <a class="btn btn-secondary btn-circle btn-sm" id="dropdownMenuButton" data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" >
	                            	<i class="fas fa-fw fa-ellipsis-h"></i>
	                            </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                	<a class="dropdown-item" href="{{route('user.masjed.show',$masjed->id)}}">{{__('show')}}</a>
                                    <a class="dropdown-item" href="#">{{__('edit')}}</a>
                                    <a class="dropdown-item" href="#">{{__('delete')}}</a>
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