<?php
class PageService {

	public function sectionEditable($popupName) {
		if (Context::getInstance()->authenticationService->isAdminUserLoggedIn()) { 
			echo '<a href="#popup-'.$popupName.'" class="editable"><img src="img/editIcon.png" class="pull-right" /></a>';
		}
	}
	
	public function includePopup($popupName) {
		include "pages/popup.php";
	}

}
?>

