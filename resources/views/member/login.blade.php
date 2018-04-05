@extends('admin.parent_layout')

@push('css_add')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/login.css') }}">
@endpush

@push('js_add')
	<script type="text/javascript" src="{{ asset('js/admin/login.js') }}"></script>
@endpush

@section('main-content')
	<div class='row'>
		<div class='col-md-4'><h1>cdcdcd</h1></div>
			<div class='col-md-4'>
				<div id='register-infor'>
					@if (isset($message))
	    					<div>
	    						{{ $message }}
	    					</div>
					@endif
				</div>
				<div id='login-panel'>
					<form action="{{ url('member/login') }}" method="post">
						{{ csrf_field() }}
			  			<div class="form-group">
			    			<label for="email">Email address:</label>
			    			<input type="email" class="form-control" id="email" name='email'>
			  			</div>
			  			<div class="form-group">
			    			<label for="pwd">Password:</label>
			    			<input type="password" class="form-control" id="pwd" name='password'>
			  			</div>
			  			<div class="checkbox">
			    			<label><input type="checkbox" name="remember_me">Duy trì đăng nhập lần sau</label>
			  			</div>
			  			<button type="submit" class="btn btn-success">Đăng Nhập vào Tài Khoản</button>
			  			<div class="form-group">
			  				<p>Bạn chưa có tài khoản?</p>
			  				<a href="{{ url('member/register') }}" class="btn btn-success">Tạo Tài Khoản</a>
			  			</div>
					</form>
				</div>
			</div>
		<div class='col-md-4'></div>
	</div>
@endsection

