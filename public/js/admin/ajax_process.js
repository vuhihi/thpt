
function hide_notification(){
	setTimeout(function(){
		$('#show-notification-message').remove();
	},3000);
}

/**$(document).ready(function() {
	    $("").click(function(e){
	    	e.preventDefault();

	    	var obj = {
				name : $('#subject').val(),
        fb_url: $('#fb_url').val(),
        fb_title: $('#fb_title').val(),
        fb_description: $('#fb_description').val(),
        fb_image: $('#fb_image').val(),
        google_keywords: $('#google_keywords').val(),
        google_description: $('#google_description').val()
						};
	$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
	$.ajax({
  		method: "POST",
  		url: "admin/add_category",
  		data: obj
	})
  	.done(function( msg ) {
    	$('<p id="show-notification-message">'+msg['success']+'</p>').appendTo($('#show-notification'));
    	hide_notification();
  	}).fail(function() {
    	$('<p id="show-notification-message">Lỗi Không Thể Thêm Chủ Đề</p>').appendTo($('#show-notification'));
  		hide_notification();
  });

});
	})












