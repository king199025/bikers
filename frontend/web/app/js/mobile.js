jQuery(document).ready(function($) {
	$('.navigation__btn').click(function(event) {
		event.preventDefault();
		$(this).toggleClass('navigation__btn-active');
		$('.navigation__menu').slideToggle();
	});
});