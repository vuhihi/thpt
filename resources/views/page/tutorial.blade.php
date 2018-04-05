@extends('page.master_layout')

@push('css_tutorial')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/page/tutorial.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
@endpush

@section('body')
<div class="row">
	<div class='col-md-2'></div>
	<div class='col-md-8'>
		<div class='row'>
			<div class='col-md-4' id='tutorial-select-item-alias'></div>
			<div id='tutorial-select-item'>
				<div id='tutorial-select-item-menu'>
					<div id="header-subject">
						<div> 
							<p id="subject-name"><span class="glyphicon glyphicon-book"></span>{{ $parent_name['name'] }}</p>
						</div>
					</div>
					<div id="tutorial-select-item-menu">
						<ul>
							@foreach($items as $item)
								<li>
									<a href="{{ url($category_link.'/'.$item['link']) }}">{{ $item['name'] }}</a>
								</li>
					
							@endforeach
							
						</ul>
					</div>	
				</div>
			</div>
			<div class='col-md-8' id='tutorial-content-item'>
				<div>
					@if(!empty($page_content['main_content']))
    					{!! $page_content['main_content'] !!}
					@endif
				</div>
			</div>
		</div>
	</div>
	<div class='col-md-2'></div>
</div>
@endsection

@section('script_tutorial')
<script type="text/javascript" src="{{ asset('js/page/tutorial.js') }}"></script>
@endsection