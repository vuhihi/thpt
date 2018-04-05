@extends('admin.layout')

@push('css_add')
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/add_category.css') }}">
@endpush

@push('js_add')
	<script type="text/javascript" src="{{ asset('js/admin/add_category.js') }}"></script>
	<script src="{{ asset('ckfinder/ckfinder.js') }}"></script>
@endpush

@section('main-content')
	<div>
		<div clas='row'>
			<div class='col-lg-6'>
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
				<div>
					 {!! Session::has('msg') ? Session::get("msg") : '' !!}
				</div>
			</div>
		</div>
		<div class='row'>
			<div class='col-lg-8'>
				<form action="{{ url('/admin/add-category') }}" method='post' >
					{{ csrf_field() }}
	  				<div class="form-group ">
	    				<label for="subject">Tên Chủ Đề:</label>
	    				<input type="text" class="form-control" id="subject" name='name'>
	  				</div>
	  				<div class="form-group ">
	    				<label for="link">Link:</label>
	    				<input type="text" class="form-control" id="link" name='link'>
	  				</div>
	  				<div id='facebook-seo' class='seo'>
	  					<div id='facebook-seo-header' class='seo-header'>
	  						<span>Facebook Meta Tag</span>
	  					</div>

		  				<div class="form-group">
		    				<label for="fb_title">Og:Title</label>
		    				<input type="text" class="form-control" id="fb_title" name='fb_title'>
		  				</div>
		  				<div class="form-group">
		    				<label for="fb_description">Og:Description</label>
		    				<textarea class="form-control" rows="5" id="fb_description" name='fb_description'></textarea>
		  				</div>
		  				<div class="form-group">
			    			<label for="fb_image">Og:Image</label>
			    			<div class="col-lg-6" style="padding:8px">
			    				<img src="" id='img-show' style="width: 100%;">
			    			</div>
			    			<input type="text" class="form-control" id="fb_image" name='fb_image' value="{{ old('fb_image') }}" /> 
			    			<button style="margin-top: 8px;" class="btn btn-primary" type="button" onclick="openPopup()">Select file</button>
			  			</div>
	  				</div>
	  				<div id='google-seo' class='seo'>
	  					<div id='google-seo-header' class='seo-header'>
	  						<span>Google Meta Tag</span>
	  					</div>
		  				<div class="form-group">
		    				<label for="google_keywords">Google Keywords</label>
		    				<input type="text" class="form-control" id="google_keywords" name='google_keywords'>
		  				</div>
		  				<div class="form-group">
		    				<label for="google_description">Google Description</label>
		    				<textarea class="form-control" rows="5" id="google_description" name='google_description'>{!! old('google_description') !!}</textarea>
		  				</div>
	  				</div>
	  				<button type="submit" class="btn btn-primary" id="button-add-category">Submit</button>
				</form>
			</div>
		</div>
	</div>
	<script>
         function openPopup() {
             CKFinder.popup( {
                 chooseFiles: true,
                 onInit: function( finder ) {
                     finder.on( 'files:choose', function( evt ) {
                         var file = evt.data.files.first();
                         document.getElementById( 'fb_image' ).value = file.getUrl();
                         document.getElementById( 'img-show' ).src = file.getUrl();
                     } );
                     finder.on( 'file:choose:resizedImage', function( evt ) {
                         document.getElementById( 'fb_image' ).value = evt.data.resizedUrl;
                     } );
                 }
             } );
         }
     </script>
@endsection
