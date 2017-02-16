$(document).ready(function(){

	function slider(delay, transitionSpeed) {
		$('[data-fn="slider"]').each(function(){
			var $this = $(this),
				$list = $this.find('.slider__list'),
				$items = $this.find('.slider__item'),
				itemWidth = $items.width(),
				counter = 1;				

				slideSpeed = delay === undefined ? 1000 : delay,
				transitionSpeed = transitionSpeed === undefined ? 500 : transitionSpeed;


			// Initialization
			$list.width(itemWidth * $items.length);

			setInterval(function(){				
				$list.animate({

					'margin-left': '-='+itemWidth

				}, transitionSpeed, function(){				

				});
			}, delay);
		});
	}

	slider(3000, 1000);
});