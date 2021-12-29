<x-app-layout>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	
            <div class="card">
                <div class="card-header">
                </div>
                @foreach($studentstatements as $studentstatement)
                <div class="card-body">
					 {{$studentstatement->amount)}}
                </div>
                 @endforeach
            </div>
           
        </div>
    </div>
</div>
</x-app-layout>
