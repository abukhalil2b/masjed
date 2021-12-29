<div class="container">
    <style>
        .card-shadow{
            box-shadow: 0px 0px 1px 0px;
        }
    </style>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <center class="alert alert-secondary">{{$program->title}}</center>
            <center class="font-bold">الطلاب</center>
            @foreach($students as $student)
            <div class="card mt-1 card-shadow">
                <div class="card-body">
                    <a href="{{route('student.show',['student'=>$student->id])}} ">
                        {{$student->name}}                  
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>