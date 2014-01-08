$(function(){
	$('.container').mouseenter(function(){
		$('.higher-layer').animate({top: '0'}, 150);
	})
})

$(function(){
	$('.container').mouseleave(function(){
		$('.higher-layer').animate({top: '240px'}, 150);
	})
})

