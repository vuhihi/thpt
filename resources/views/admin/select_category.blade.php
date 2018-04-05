@extends('admin.layout')

@push('css_add')
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{ asset('css/admin/select_category.css') }}"
    
@endpush
	<script type="text/javascript" src="{{ asset('js/admin/select_category.js') }}"></script>
@push('js_add')
	
	
	
@endpush

@section('main-content')
	 <div class='row'>
	 	<div id='search-box'>
	 		<input type="text" name=""><button type="button">Search</button>	
	 	</div>
	 </div>
	 <div class="row">
	 	<div id="category-item">
	 	@foreach ($cates as $cate)
         	<div class="col-lg-2 item-cover">
         		<div class="category-cover">
         			<span class="glyphicon glyphicon-cog"></span>
         		</div>
         		<div class="category-item">
         			<img src="{{ $cate->fb_image }}">
         			<p>{{ $cate->name }}</p>
         		</div>
         	</div>
    	@endforeach
	 	</div>
	 </div>
@endsection
