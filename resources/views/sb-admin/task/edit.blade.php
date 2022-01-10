@extends('layouts.sb_admin')
@section('content')

	<h4>المهام</h4>
	<form method="post" action="{{route('task.update',$task->id)}}">
		@csrf
        <table class="table">
        <tr>
          <td>{{__('title')}}</td>
          <td>
        <input name="title" class="form-control" value="{{$task->title}}">
        </td>
        </tr>
        <tr>
          <td>{{__('description')}}</td>
          <td>
        <input name="description" class="form-control" value="{{$task->description}}">
        </td>
        </tr>
        <tr>
          <td>{{__('maxpoint')}}</td>
          <td>
          <input name="maxpoint" class="form-control" value="{{$task->maxpoint}}" type="number">
          </td>
        </tr>
        <tr>
          <td colspan="2">
          <button class="btn btn-info btn-block">حفظ</button>
          </td>
        </tr>
        </table>
    </form>
    
@endsection
