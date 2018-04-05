$(window).on("load", function (e) {
	setSelectItemWidthandResize();
});

$(window).resize(function(e) {
 	setSelectItemWidthandResize();
 	setSelectItemHeightonScrollandResize();
});

$(window).scroll(function(e) {
	setSelectItemHeightonScrollandResize();
})

function setSelectItemHeightonScrollandResize(){
	var h = $(window).height();
	var header_height = $('#header-wrapper').outerHeight();
	if($(window).scrollTop() >= header_height){
		var scrolltop = $(window).scrollTop();
		$('#tutorial-select-item').offset({ top: scrolltop});
		$('#tutorial-select-item').outerHeight($(window).height());
	}else{
		$('#tutorial-select-item').offset({ top: $('#header-wrapper').outerHeight() + 10});
		$('#tutorial-select-item').outerHeight($(window).height()-$('#header-wrapper').outerHeight()-10);
	}
}

function setSelectItemWidthandResize(){
	var h = $(window).height();
	var header_height = $('#header-wrapper').outerHeight();
	$('#tutorial-select-item').outerHeight(h-header_height-10);
	$('#tutorial-select-item').outerWidth($('#tutorial-select-item-alias').outerWidth());
}