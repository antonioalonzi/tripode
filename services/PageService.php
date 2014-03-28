<?php
class PageService {

	public function sectionEditable($popupId) {
		if (Context::getInstance()->authenticationService->isAdminUserLoggedIn()) { 
			echo '<a href="#'.$popupId.'" class="editable"><img src="img/editIcon.png" class="pull-right" /></a>';
		}
	}
	
	public function includePopup($popupId, $popupName) {
		include "pages/popup.php";
	}

}
?>

