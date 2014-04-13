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
	
	$('a.methodPostConfirm').click(function(event) {
		event.preventDefault();
		
		if (confirm($(this).attr('confirmationMessage'))) {
			$('<form action="'+$(this).attr('href')+'" method="POST"/>')
				.appendTo($(document.body))
				.submit();
		}
	});
	
	
	// gallery
	$('#addCategoryButton').click(function() {
		$('#addCategoryButton').hide();
		$('#addCategoryPosition').show();
		$('#addCategoryForm').show();
		$('#addCategoryCancel').show();
		$('#categoryName').focus();
	});
	
	$('#addCategoryCancel').click(function() {
		$('#addCategoryPosition').hide();
		$('#addCategoryForm').hide();
		$('#addCategoryCancel').hide();
		$('#addCategoryButton').show();
	});
});

function postMeSubmit() {
	
}