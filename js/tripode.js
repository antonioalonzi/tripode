$(document).ready(function() {
	if ($('#openDefaultPopup').length) {
		$($('#openDefaultPopup').attr('href')).fadeIn();
	}
	
	$('a.editable').click(function() {
		$($(this).attr('href')).fadeIn();
	});
	
	$('a.closePopup').click(function() {
		$($(this).attr('href')).fadeOut();
	});
	
	$('a.methodPost').click(function(event) {
		event.preventDefault();
		$('<form action="'+$(this).attr('href')+'" method="POST"/>')
			.appendTo($(document.body))
			.submit();
	});
});