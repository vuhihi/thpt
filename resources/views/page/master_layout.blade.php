<!doctype html>
<html>
	<head>
		<title>@yield('title')</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<meta name="keywords" content=@yield("google_keywords")/>
		<meta name="description" content=@yield("google_description")/>

		<meta property="og:url" content=@yield('fb_url') />
		<meta property="og:type" content="article" />
		<meta property="og:title" content=@yield('fb_title') />
		<meta property="og:description" content= @yield('fb_description') />
		<meta property="og:image" content=@yield('fb_image') />
		<meta property="fb:app_id" content=@yield('fb_app_id') />

		<link rel="stylesheet" href="{{asset('css/style.css')}}">
		 @stack('css_index')
		 @stack('css_tutorial')
		<!-- bootstrap -->
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		
		<!--google font-->
		<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
	</head>
	<body>
		<div class='container-fluid'>
		<!-- header -->
			<header>
				<div id='header-wrapper' class='row'>
					<div id='header-logo' class='col-lg-6'>
						<img id='header-logo-img1' src = "{{ asset('images/logo/logo.png') }}"  />
						<img id='header-logo-img2' src = "{{ asset('images/logo/logo-name.png') }}" />
			        </div>
			        <div id='header-menu' class='col-lg-6'>
			        	@if (Auth::check())
			        		<span>{{ Auth::user()->name }}</span>
			        		    <a href="{{ url('member/logout') }}">Đăng Xuất</a>
			        		
			        	@else
			        		<a href="{{ url('member/login') }}">Đăng Nhập</a>
						@endif
			        </div>	
				</div>	
			</header>
		<!-- body -->
			<div id='body'>
				@yield('body')
			</div>
			<footer>
				
			</footer>
		</div>

		<!-- javascript-->
		<script type="text/javascript" src="{{ asset('js/page/index.js') }}"></script>
		@yield('script_tutorial')
	</body>
</html>