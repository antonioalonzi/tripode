<div class="homePageText">
	<?php Context::getInstance()->pageService->sectionEditable("homeEdit") ?>
	
	<!-- Include customized home page -->
	<?php include "home.html" ?>
	
	<?php Context::getInstance()->pageService->includePopup("homeEdit"); ?>
	
</div>
