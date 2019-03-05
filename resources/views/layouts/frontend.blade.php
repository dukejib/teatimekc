<!DOCTYPE html>
<html lang="en">

<head>
    <base href="https://teatime.karacraft.com">

	<title>{{ config('app.name')}} </title>
	
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport"               	  	content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" 		  	content="ie=edge">
    <meta http-equiv="Content-Type" 			content="text/html; charset=UTF-8">
    <meta name="description" 					content="Teatime for discusison, views, thoughts and socializing">
    <meta name="keywords" 						content="america,world,views,thoughts,discussions,twitter,facebook,blog,social,pakistan,politics,books,reviews,chat,health,kpk,sindh,punjab,balochistan,life,vision,special">
    <meta name="author" 						content="Ali Jibran">
    <meta name="createdby" 						content="https://karacraft.com">
    <meta name="robots" 						content="index.follow">

    <!-- Add Web Specific Meta Tags -->
    @yield('meta-tags')

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/css/blog.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet" >
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <!-- Animate.css -->
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    
    <!-- Additional, Pag Specific -->
    @yield('css')

    <!-- Add Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('images/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('images/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('images/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('images/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('images/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('images/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('images/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png')}}">
    <link rel="manifest" href="{{ asset('images/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('images/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#ffffff">

</head>
 
<body>

    <!-- Navigation -->
    @include('includes.navbar_frontend')
    <!-- Navigation End -->

    <!-- Content Container -->
    <div class="container">
        <!-- Actual Page Content -->
        @yield('contents')
    </div>
    <br>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      	<div class="container">
        	<p class="m-0 text-center">Copyright &copy; Karacraft.com 2018</p>
      	</div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>

    <!-- Addthis.com -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5be43c6e4dd7fc46"></script>
    {{-- Disqus.com --}}
    <script id="dsq-count-scr" src="//sgblog-karacraft-com.disqus.com/count.js" async></script>
    
    <!-- Additonal Scripts -->
    @yield('scripts')

    <!-- Error/Info/Succes Reporting -->
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
  
</body>

</html>

