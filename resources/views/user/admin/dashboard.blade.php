<div class="container">
    <div class="box box-blue mt-2 mb-2">
        <div class="box-top box-top-blue">
            <a href="{{route('user.masjed.create')}}">اضافة مسجد جديد</a>
        </div>
        
        <div class="box box-blue mt-2 mb-2 p-1 m-1">
            @foreach($masjeds as $user)
            <div>
                <a class="text-blue-900" href="{{route('user.masjed.show',['masjed'=>$user->id])}}">{{$user->name}}</a>
            </div>
            @endforeach
        </div>
    </div>

    <div class="box box-blue mt-2 mb-2">
        <div class="box-top box-top-blue">
            {{__('programs')}}
        </div>
        <div class="box box-blue mt-2 mb-2 p-1 m-1">
            @foreach($programs as $program)
            <div class="box-body">
                <div>
                    <a class="text-blue-900" href="">{{$program->title}}</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>


    <div class="box box-blue mt-2 mb-2">
        <div class="box-top box-top-blue">
            {{__('students')}}
        </div>
        <div class="box box-blue mt-2 mb-2 p-1 m-1">
            @foreach($students as $student)
            <div class="box-body">
                <div>
                    <a class="text-blue-900" href="">{{$student->name}}</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="box box-blue mt-2 mb-2">
        <div class="box-top box-top-blue">
            {{__('tasks')}}
        </div>
        <div class="box box-blue mt-2 mb-2 p-1 m-1">
            @foreach($tasks as $task)
            <div class="box-body">
                <div>
                    <a class="text-blue-900" href="">{{$task->title}}</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
   
</div>


