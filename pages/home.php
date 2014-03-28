<div class="homePageText">
	<?php Context::getInstance()->pageService->sectionEditable("popup-edit-home") ?>
	
	<!-- Include customized home page -->
	<?php include "home.html" ?>
	
	<?php Context::getInstance()->pageService->includePopup("popup-edit-home", "homeEdit"); ?>
	
</div>
