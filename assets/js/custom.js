(function ($) {
	$(document).ready(function () {
		// start fixed menu
		$(window).scroll(function() {
			let scroll = $(window).scrollTop();
			if (scroll >= 65) {
				$(".header").addClass("header_fixed wow animate__animated  animate__fadeInDown");
			} else {
				$(".header").removeClass("header_fixed wow animate__animated  animate__fadeInDown");
			}
		});
		// end fixed menu

		//start
		$('.collapse').on('click', function () {
			if ($('.header__inner').hasClass('header__inner_hide')) {
				faAngleUp();
			} else {
				faAngleDown();
			}
		});
		//     $('.portfolio-gallery').slick({
		//       arrows: false,
		//       dots: true,
		//     });
		$('.reviews-slider').slick({
			arrows: false,
			slidesToShow: 5,
			slidesToScroll: 3,
			initialSlide: 1,
			dots: true,
			centerMode: true,
			focusOnSelect: true,
			infinite: false,
			responsive: [
				{
					breakpoint: 1980,
					settings: {
						slidesToShow: 4,
						slidesToScroll: 3,
						initialSlide: 2,
						dots: true,
					},
				},
				{
					breakpoint: 1385,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 3,
						initialSlide: 2,
						dots: true,
					},
				},
				{
					breakpoint: 980,
					settings: {
						slidesToShow: 1,
					},
				},
			],
		});
		// start functions
		function faAngleUp() {
			$('.fa-angle-up').addClass('collapse_active');
			$('.fa-angle-down').removeClass('collapse_active');
			//
			$('.header').removeClass('header_collapse');
			$('.header').addClass('animate__animated animate__fadeInDown animate__faster');
			$('.header__inner').removeClass('header__inner_hide');
		}
		function faAngleDown() {
			$('.fa-angle-up').removeClass('collapse_active');
			$('.fa-angle-down').addClass('collapse_active');
			//
			$('.header').addClass('header_collapse');
			$('.header').removeClass('animate__animated animate__fadeInDown animate__faster');
			$('.header__inner').addClass('header__inner_hide');
		}
		// end functions
		$('.btns__order-rework').on('click', function () {
			$('select.wpcf7-form-control option[value="Доработка сайта"]').prop('selected', true);
		});
		$('.btns__order-site').on('click', function () {
			$('select.wpcf7-form-control option[value="Создание сайта-визитки"]').prop('selected', true);
		});
		new WOW().init();
		// start technology
		$('.technology-item__progress span').each(function () {
			$(this).css({ width: `${$(this).attr('data-level')}%` });
		});
		// end technology
		// start menu
		$('.header__nav-mob').on('click', function () {
			$(this).find('div').toggleClass('nav-mob_active');
			if ($('.header__nav-mob__open').hasClass('nav-mob_active')) {
				$('.header__nav').removeClass('header__nav_active');
			} else {
				$('.header__nav').addClass('header__nav_active');
			}
		});
		// end menu
		lightbox.option({
			resizeDuration: 300,
			wrapAround: true,
			albumLabel: 'Картинка %1 из %2',
		});
		// end
	});
})(jQuery);
