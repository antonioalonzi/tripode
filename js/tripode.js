$(document).ready(function() {
	// general
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
	
	
	// gallery
	$('#addCategoryButton').click(function() {
		$('#addCategoryButton').hide();
		$('#addCategoryPosition').show();
		$('#addCategoryForm').show();
		$('#addCategoryCancel').show();
	});
	
	$('#addCategoryCancel').click(function() {
		$('#addCategoryPosition').hide();
		$('#addCategoryForm').hide();
		$('#addCategoryCancel').hide();
		$('#addCategoryButton').show();
	});
});
