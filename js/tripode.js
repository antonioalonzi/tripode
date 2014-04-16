$(document).ready(function() {
	// general
	if ($('#openDefaultPopup').length) {
		$($('#openDefaultPopup').attr('href')).fadeIn();
	}
	
	$('a.editable').click(function() {
		$('a.closePopup').trigger('click');
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
		$('#categoryName').focus();
	});
	
	$('#addCategoryCancelButton').click(function() {
		$('#addCategoryPosition').hide();
		$('#addCategoryForm').hide();
		$('#addCategoryButton').show();
	});
	
	$('.renameCategoryButton').click(function() {
		var categoryIndex = $(this).attr('href').substr(1);
		$('#category' + categoryIndex + 'Name').hide();
		$('#category' + categoryIndex + 'Form').show();
		$('#category' + categoryIndex + 'Form [type=reset]').click(function() {
			$('#category' + categoryIndex + 'Name').show();
			$('#category' + categoryIndex + 'Form').hide();
		});
	});
});
