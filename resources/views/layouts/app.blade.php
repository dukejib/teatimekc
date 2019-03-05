<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('blog.backend', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet" >

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <!-- Nafees Nastaleeq -->
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/nafees-nastaleeq" type="text/css"/> 

    <!-- Extra Styles -->
    @yield('styles')

</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/admin/dashboard') }}">
                <i class="fas fa-cog"></i>
                {{ config('blog.backend', 'Laravel') }}
                <span class="urdu" style="font-size:20px;">ایڈمن پینل</span>
            </a>
            {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button> --}}

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt"></i>
                                {{ __('Login') }}
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">
                                <i class="far fa-registered"></i>
                                {{ __('Register') }}</a>
                            @endif
                        </li> --}}
                    @else
                        {{-- <li class="nav-item">
                            <a href="{{ route('index') }}" class="nav-link">Go To Blog</a>
                        </li>
                        <li class="nav-item">
                            <img src="{{ asset(Auth::user()->profile->avatar) }}" class="rounded-circle" width="40px">
                        </li> --}}
                        {{-- <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a> --}}

                            {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                                
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt fa-fw"></i>
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                                
                            </div> --}}
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- Your Content -->
    @yield('content')
    


    <!-- Scripts -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <!-- Charts -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js'></script>
    
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <script src="{{ asset('js/toastr.min.js') }}"></script>

    <script>
        @if(Session::has('success'))
            toastr.success('{{ Session::get('success') }}','Success');
        @endif

        @if(Session::has('info'))
            toastr.info('{{ Session::get('info') }}','Information');
        @endif

        @if(Session::has('failure'))
            toastr.error('{{ Session::get('failure') }}','Failure');
        @endif
    </script>

    <!-- For Extra Scripts -->
    @yield('scripts')

</body>
</html>
