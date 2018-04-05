$(window).on('load',function(){
	$('#subject').focusout(function(){

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
		$.ajax({
  		method: "POST",
  		url: "set-category-link",
  		data:{name:$('#subject').val()}
	})
  	.done(function( msg ){
  		$("#link").val(msg);
  	});

	});
});