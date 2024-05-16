/**
 * Front-end JavaScript
 *
 * The JavaScript code you place here will be processed by esbuild. The output
 * file will be created at `../theme/js/script.min.js` and enqueued in
 * `../theme/functions.php`.
 *
 * For esbuild documentation, please see:
 * https://esbuild.github.io/
 */
(function ($) {
	window.onload = function () {
		$(document).ready(function () {
			menuMobile();
			
		});
	};
	function menuMobile() {
		const elements = ['.bar__mb', '.menu__mobile'];
		if (elements.some((el) => $(el).length)) {
			$('.bar__mb').click(function () {
				let headerHeight = $("header").outerHeight();
				$(this).toggleClass('active').find('svg').toggle('fast');
				$('.menu__mobile').toggleClass('active');
				$('.overlay').toggleClass('active');
				$('html').toggleClass('overflow-hidden');
				$('.menu__mobile').css('top',headerHeight);
			});
			$('.overlay').click(function () {
				$('.bar__mb').removeClass('active').find('svg').toggle('fast');
				$('.menu__mobile').removeClass('active');
				$('.overlay').removeClass('active');
				$('html').removeClass('overflow-hidden');
			});
		}
		$('.menu__mobile ul li.menu-item-has-children>ul').before(
			`<span class="li-plus"></span>`
		);

		if ($('.li-plus').length) {
			$('.li-plus').click(function (e) {
				$(this).toggleClass('clicked');
				$(this).next('.sub-menu').slideToggle(200);
				$(this)
					.parent()
					.siblings()
					.find('.li-plus')
					.removeClass('clicked')
					.siblings('.sub-menu')
					.slideUp();
			});
		}
	}
})(jQuery);
