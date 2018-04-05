<!doctype html>
<html>
	<head>
		<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="{{asset('css/admin/index.css')}}">
		@stack('css_add')
		<!-- bootstrap -->
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		@stack('js_add')
	</head>
	<body>
		<div class='container-fluid'>
		<!-- header -->
			<header>
				<div id='header-wrapper'>
					<div id='header-logo'>
						<img id='header-logo-img1' src = "{{ asset('images/logo/logo.png') }}"  />
						<img id='header-logo-img2' src = "{{ asset('images/logo/logo-name.png') }}" />
			        </div>	
				</div>	
			</header>
		<!-- body -->
			<div id='body'>
				<div class='row'>
					<div id='body-2-lg' class = 'col-lg-2'>
							@yield('left-sider')
					</div>
					<div id='body-10-lg' class= 'col-lg-10'>
						<div id='main-conten'>
							@yield('main-content')
						</div>
					</div>
				</div>
			</div>
			<footer>
				
			</footer>
		</div>

		<!-- javascript-->
		<script type="text/javascript" src="{{ asset('js/admin/index.js') }}"></script>
	</body>
</html>