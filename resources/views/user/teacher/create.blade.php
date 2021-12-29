<x-app-layout>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>اضافة مدرس  جديد  </h4>
                </div>
                <div class="card-body">
					<form method="post" action="{{route('user.teacher.store')}}">
						@csrf
						<div class="mt-3">
							{{__('name')}}
							<input name="name" class="form-control" placeholder="{{__('name')}}">
						</div>
						<div class="mt-3">
							{{__('email')}}
	                    	<input name="email" class="form-control" placeholder="{{__('email')}}">
						</div>
		                <div class="mt-3">
		                	كلمة المرور ستكون نفس {{__('email')}}
	                    	<button class="btn btn-info btn-block">حفظ</button>
		                </div>
                    </form>
                </div>
                <hr>
                <div class="card-body">
					@foreach($teachers as $teacher)
					<div class="alert alert-info">
						<div>
						<h4>{{$teacher->name}}</h4>
						</div>
						<div>
						{{__('email')}}:{{$teacher->email}}
						</div>
					</div>
					@endforeach
                </div>

            </div>
        </div>
    </div>
</div>
</x-app-layout>
