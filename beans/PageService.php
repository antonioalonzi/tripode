<?php
class PageService {

	public function sectionEditable($popupName) {
		if (Context::getInstance()->authenticationManager->isAdminUserLoggedIn()) { 
			echo '<a href="#popup-'.$popupName.'" class="editable"><img src="img/icons/edit.png" class="pull-right" /></a>';
		}
	}
	
	public function includePopup($popupName) {
		include "pages/popup.php";
	}

}
?>

