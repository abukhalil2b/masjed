<!DOCTYPE html>
<html dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>


        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

    
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        <link href="{{ asset('css/box-style.css') }}" rel="stylesheet">
       
 
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="mt-3">
            <!-- Page Content -->
            
            <div class="container">
                <center class="row">
                    <div class="col-lg-12">
                        @auth
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button class="btn btn-sm text-danger m-1 float-left">تسجيل الخروج</button>
                        </form>
                        @endauth

                        <h2 class="p-3">
                            <a href="{{route('dashboard')}}" >
                            {{ config('app.name','') }}
                            </a>
                        </h2>
                    </div>
                </center>
            </div>

            @if($errors->any())
                <center class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                @foreach($errors->all() as $error)
                    <li class="text-danger">{{$error}}</li>
                @endforeach
                </center>
             @endif
             
            @if(session('status'))
            <center class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 alert alert-{{session('status','info')}}">
               {{session('message')}}
            </center>
            @endif

            {{ $slot }}

    </body>
</html>
