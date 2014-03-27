$(document).ready(function() {
	$('a.editable').click(function() {
		$($(this).attr('href')).fadeIn();
	});
	
	$('a.closePopup').click(function() {
		$($(this).attr('href')).fadeOut();
	});
});
