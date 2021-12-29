@extends('layouts.sb_admin')
@section('content')
	<h4>المهام</h4>
	<form method="post" action="{{route('task.store')}}">
		@csrf
        <table class="table">
			<tr>
        		<td>{{__('title')}}</td>
        		<td>
                  <input name="title" class="form-control">
                </td>
        	</tr>
        	<tr>
        		<td>{{__('description')}}</td>
        		<td>
                  <input name="description" class="form-control">
                </td>
        	</tr>
        	<tr>
        		<td>{{__('maxpoint')}}</td>
        		<td>
                  <input name="maxpoint" class="form-control">
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
