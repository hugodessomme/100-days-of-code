$(document).ready(function(){

	function slider(delay) {
		$('[data-fn="slider"]').each(function(){
			var $this = $(this),
				$list = $this.find('.slider__list'),
				$item = $this.find('.slider__item');			
				delay = delay === undefined ? 1000 : delay;


			// Initialization
			$list.width($item.width() * $item.length);

			setInterval(function(){
				$('.slider__list').animate({
					'margin-left': '-=500'
				});
			}, delay);
		});
	}

	slider(2000);
});