<div class="homePageText">
	<?php if (Context::getInstance()->authenticationService->isAdminUserLoggedIn()) { ?>
		<a href="#popup-edit-home" class="editable"><img src="img/editIcon.png" class="pull-right" /></a>
	<?php } ?>
	
	<!-- Include customized home page -->
	<?php include "home.html" ?>
	
	
	<?php Context::getInstance()->pageService->includePopup("popup-edit-home", "editHome"); ?>
	
</div>
