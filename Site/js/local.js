// JavaScript Document
$(document).ready(function(e) {
	$(".thumbfixh a img").click(function(){
		$(".visible-img").css("display","none");
		$(".visible-img").fadeIn(500);
	});
	$(".clearing-main-next").click(function(){
		if($(".clearing-main-next disabled")){
			
		} else {
			$(".visible-img").css("display","none");
			$(".visible-img").fadeIn(500);
		}
	});
});