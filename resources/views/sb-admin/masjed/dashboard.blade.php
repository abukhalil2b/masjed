<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{auth()->user()->name}}</h4>
                </div>
                <div class="card-body">
                    @if($program)
                    <div class="row">
                        <div class="col-lg-12 center">
                            <div class="card">
                               <div class="card-body">
                                   <h4 >برنامج: {{$program->title}}</h4>
                                    <a class="btn btn-sm" href="{{route('program.student.create',['program'=>$program->id])}}">
                                    اختر طلاب لإضافتهم إلى البرنامج
                                    </a>

                                    <a class="btn btn-sm" href="{{route('program.task.create',['program'=>$program->id])}}">
                                    اختر مهام لإضافتها إلى البرنامج
                                    </a>
                               </div>
                               <hr>
                               <center>قائمة الطلاب المشتركين في البرنامج</center>
                                @foreach($program->students as $student)
                                <div class="bar">
                                    ({{$student->id}}) {{$student->name}}
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="row">
                        <div class="col-lg-12">
                            <center>
                                <a href="{{route('program.create')}}">+ فتح برنامج جديد</a>
                            </center>
                        </div>
                    </div>
                    @endif
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div class=" m-1 p-1 card">
                                <div><span class="font-bold text-blue-800">الطلاب:</span> {{count($students)}}</div>
                                <a href="{{route('student.create')}}">+إضافة طالب جديد</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class=" m-1 p-1 card">
                                <div><span class="font-bold text-blue-800">المدرسين:</span> {{count($teachers)}}</div>
                                <a href="{{route('user.teacher.create')}}">+إضافة مدرس جديد</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class=" m-1 p-1 card">
                                <div>{{$studentstatement->total}}</div>
                                <a href="{{route('studentstatement.create')}}">الرصيد</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class=" m-1 p-1 card">
                                <div><span class="font-bold text-blue-800">المهام:</span> {{count($tasks)}}</div>
                                <a href="{{route('task.index')}}">+إضافة مهام جديدة</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class=" m-1 p-1 card">
                                <div><span class="font-bold text-blue-800">البرامج:</span> {{count($programs)}}</div>
                                <a href="{{route('program.create')}}">+إضافة برنامج جديد</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>