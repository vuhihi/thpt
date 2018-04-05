$(window).on('load',function(){
	$('#facebook-seo > div.form-group').css('display','none');
	$('#google-seo > div.form-group').css('display','none');
});
$(window).on('load',function(){
	$('#facebook-seo-header').click(function(){
		$('#facebook-seo > div.form-group').fadeToggle();
	});

	$('#google-seo-header').click(function(){
		$('#google-seo > div.form-group').fadeToggle();
	});
});

$(window).on('load',function(){
	$('#parent-page-list>button').click(function(evevt){
		event.preventDefault();
		$("#parent-page-list>button").attr('disabled',true);
		$.get('get-parent',function(data){
			
				var obj = JSON.parse(data);
					
    				for(var i = 0; i < obj.length; i++){
    					console.log(obj[i]['name']);
    					var name = obj[i]['name'];
    					var id = obj[i]['id']
    					$('<input onclick="set_parent_name()" type="radio" name="parent_id" class="parent_id" value="'+id+'">'+name+'<br>')
    					.appendTo($('#parent-page-list>div'));
    				}
		});
	});
});

$(window).on('load',function(){
  $('#name').focusout(function(){
    var name = $('#name').val();

    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
        method: "POST",
        url: 'set-page-link',
        data:{'name':name}
      })
      .done(function( msg ){
        $("#link").val(msg);
      });
  });
});

function set_parent_name(){
  
      var id = $('input[name="parent_id"]:checked').val();
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
        method: "POST",
        url: 'set-parent-name',
        data:{'id':id}
      })
      .done(function( msg ){
        $("#parent").val(msg);
      });  

}

	

