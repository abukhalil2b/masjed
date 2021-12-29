@extends('layouts.sb_admin')
@section('content')
	<div class="container">
    <div class="box box-blue mt-2 mb-2 p-2">
        عدد {{__('masjeds')}}
        <div class="box box-blue mt-2 mb-2 p-1 m-1">
            
            {{count($masjeds)}}
        </div>
    </div>

    <div class="box box-blue mt-2 mb-2 p-2">
        عدد {{__('programs')}}
        <div class="box box-blue mt-2 mb-2 p-1 m-1">
            
            {{count($programs)}}
        </div>
    </div>

    <div class="box box-blue mt-2 mb-2 p-2">
        عدد {{__('students')}}
        <div class="box box-blue mt-2 mb-2 p-1 m-1">
            
            {{count($students)}}
        </div>
    </div>

    <div class="box box-blue mt-2 mb-2 p-2">
        عدد {{__('tasks')}}
        <div class="box box-blue mt-2 mb-2 p-1 m-1">
            
            {{count($tasks)}}
        </div>
    </div>
   
</div>
@endsection