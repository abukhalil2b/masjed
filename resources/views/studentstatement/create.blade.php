<x-app-layout>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>المهام</h4>
                </div>
                <div class="card-body">
					<form method="post" action="{{route('studentstatement.store')}}">
						@csrf
	                    <table class="table">
							<tr>
	                    		<td>{{__('amount')}}</td>
	                    		<td>
		                          <input name="amount" class="form-control">
	                            </td>
	                    	</tr>
	                    	<tr>
	                    		<td>{{__('description')}}</td>
	                    		<td>
		                          <input name="description" class="form-control">
	                            </td>
	                    	</tr>
	                    	<tr>
	                    		<td>{{__('status')}}</td>
	                    		<td>
		                          <select name="status" class="form-control">
		                          	<option value="in">إيرادات</option>
		                          	<option value="out">مصروفات</option>
		                          </select>
	                            </td>
	                    	</tr>
	                    	
	                        <tr>
	                            <td colspan="2">
	                                <button class="btn btn-info btn-block">حفظ</button>
	                            </td>
	                        </tr>
	                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container mt-5">
    <div class="row justify-content-center">
    	<center>التفاصيل</center>
        <div class="col-md-12">
            <div class="card">
            	<div class="card-body">
            		@foreach($studentstatements as $studentstatement)
		            <div>
		            	{{abs($studentstatement->amount)}}
		            	<small class="pull-left">{{$studentstatement->created_at->diffForHumans()}}</small>
		            	<div><small>{{$studentstatement->description}}</small></div>
		            	<div><small>{{$studentstatement->status=='in'?'إيداع':'صرف'}}</small></div>
		            </div>
		            <hr>
		            @endforeach
            	</div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
