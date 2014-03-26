<div class="homePageText">
	<?php if (Context::getInstance()->authenticationService->isAdminUserLoggedIn()) { ?>
		<a href="#popup-edit-home" class="editable"><img src="img/editIcon.png" class="pull-right" /></a>
	<?php } ?>
	
	<?php include "home.html" ?>
	
	
	
	<div id="popup-edit-home" class="editPopup" style="display: none">
		<a href="#popup-edit-home" class="closePopup"><img src="img/closeIcon.png" class="pull-right" /></a>
		<div>
			<form action="?action=editHome" method="post" class="form-vertical">
				<div class="control-group">
					<div class="control-label">
						<label id="text-lbl" for="text" class="required"><? echo Context::getInstance()->translationService->translate("home.text") ?></label>
					</div>
					<div class="controls">
						<textarea rows="10" cols="50" name="text" id="text" required aria-required="true" style="width: 100%"><?php include "home.html" ?></textarea> 
					</div>
				</div>
				<div class="controls">
					<button type="submit" class="btn btn-primary"><? echo Context::getInstance()->translationService->translate("action.save") ?></button>
				</div>
			</form>
		</div>
	</div>
</div>
