jQuery(document).ready(function($) {
	$('.motocalendar_title').click(function(event) {
		event.preventDefault();
		$('.motocalendar_title').removeClass('motocalendar_title-active');
		$(this).addClass('motocalendar_title-active');
		
		var target = ($(this).data('tab'));		
		
		$('.motocalendar__tab').hide();
		$("."+ target).show();
	});
	
	$('.motocalendar__list_nav_btn').click(function(event) {
		event.preventDefault();
		$('.motocalendar__list_nav_btn').removeClass('motocalendar__list_nav-active');
		$(this).addClass('motocalendar__list_nav-active');
		
		var target = ($(this).data('tab'));		
		
		$('.motocalendar__list_tab').hide();
		$("."+ target).show();
	});
});