$(document).ready(function(){

	function slider(delay, transitionSpeed) {
		$('[data-fn="slider"]').each(function(){
			var $this = $(this),
				$list = $this.find('.slider__list'),
				$items = $this.find('.slider__item'),
				itemWidth = $items.outerWidth(true),
				itemHeight = $items.outerHeight(true),
				counter = 0;				

				_delay = delay === undefined ? 1000 : delay,
				_transitionSpeed = transitionSpeed === undefined ? 500 : transitionSpeed;

			// Initialization
			$this.width(itemWidth);
			$list.width(itemWidth * $items.length).height(itemHeight);

			// 1st element is active by default
			$items.first().addClass('is-active');

			setInterval(function(){				
				$list.animate({

					'margin-left': '-='+itemWidth

				}, _transitionSpeed, function(){				
					counter++;
					
					$items.removeClass('is-active');
					$('.slider__item:eq('+counter+')').addClass('is-active');

					if (counter === $items.length - 1) {
						counter = 0;

						$list.animate({
							'margin-left': 0
						});
					}
				});
			}, _delay);
		});
	}

	slider(3000, 1000);
});