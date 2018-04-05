
@extends('page.master_layout')

@push('css_index')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/page/index.css') }}">
@endpush

@section('body')
<div class='row'>
	<div class='col-md-1'></div>
		<div class='col-md-10' id='body-item-1'>
			<div class='row item-group'>

				@foreach ($items as $item)
    				<div class='col-md-4'>
						<div class='item'>
							<a href="{{ url($item['link']) }}">{{ $item['name'] }}</a>
						</div>	
					</div>
				@endforeach
				
			</div>
		</div>
	<div class='col-md-1'></div>
</div>
@endsection