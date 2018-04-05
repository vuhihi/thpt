@extends('admin.parent_layout')

@push('css_add')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/login.css') }}">
@endpush

@push('js_add')
	<script type="text/javascript" src="{{ asset('js/admin/login.js') }}"></script>
@endpush

@section('main-content')
	<div class='row'>
		<div class='col-md-4'></div>
			<div class='col-md-4'>
				<div id='register-infor'>
					@if ($errors->any())
    					<div class="alert alert-danger">
        					<ul>
            		@foreach ($errors->all() as $error)
                			<li>{{ $error }}</li>
            		@endforeach
        					</ul>
   						</div>
					@endif
				</div>
				<div id='register-panel'>
					<form action="{{ url('member/register') }}" method='post'>
						{{ csrf_field() }}
						<div class="form-group">
			    			<label for="name">Name:</label>
			    			<input type="text" class="form-control" id="name" name='name'>
			  			</div>
			  			<div class="form-group">
			    			<label for="email">Email address:</label>
			    			<input type="email" class="form-control" id="email" name='email'>
			  			</div>
			  			<div class="form-group">
			    			<label for="password">Password:</label>
			    			<input type="password" class="form-control" id="password" name=password>
			  			</div>
			  			<div class="form-group">
			    			<label for="password_confirmation">Enter Password Again:</label>
			    			<input type="password" class="form-control" id="password_confirmation" name='password_confirmation'>
			  			</div>
			  			
			  			<button type="submit" class="btn btn-success">Submit</button>
			  			<div class="form-group">
			  				<p>Bạn đã có tài khoản?</p>
			  				<a href="{{ url('member/login') }}" class="btn btn-success">Login</a>
			  			</div>
					</form>
				</div>
			</div>
		<div class='col-md-4'></div>
	</div>
@endsection

