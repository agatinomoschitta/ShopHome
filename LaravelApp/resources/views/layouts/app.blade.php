<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="{{asset('css/template.css')}}" rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet"
        	href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        	integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
        	crossorigin="anonymous">
        	
        @yield('header_css')	
        @yield('user_header_css')	
        @yield('top_menu_css')	
        @yield('side_menu_css')	
        @yield('content_css')	
        @yield('footer_css')	
        @yield('slider_css')		
        @yield('page_css')	
    </head>
    <body>
    
    	@yield('user_header')
    	@yield('header')
    	@yield('top_menu')   	
    	@yield('content')
    	@yield('footer')
    	
    	@yield('script_header')
    	@yield('script_user_header')
    	@yield('script_top_menu')
    	@yield('script_side_menu')
    	@yield('script_content')
    	@yield('script_slider')
    	@yield('script_footer')
        @yield('script_page')
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </body>
</html>