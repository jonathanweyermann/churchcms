$(document).ready(function(){
	
	resizeContent();
	$( window ).resize(function(){
		resizeContent();
    });
});

function resizeContent(){ 
	$width = $(window).width()*.84;
	if ($width > 1000) $width = 1000;
	$("#calendar").width($width);
	$("#calendar").height($width/1.5);
}