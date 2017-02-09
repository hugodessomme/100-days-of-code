$(document).ready(function(){
	setInterval(function(){
		$('.slider__list').animate({
			'margin-left': '-=500'
		});
	}, 1000);
});