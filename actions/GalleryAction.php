<?php

class GalleryAction {
	
	public function doPost() {
		if (!Context::getInstance()->authenticationService->isAdminUserLoggedIn()) {
			$_REQUEST['ERROR'] = "error.permissionDenied";
			return;
		}
		
		if (isset($_REQUEST['galleryAction'])) {
			$galleryAction = $_REQUEST['galleryAction'];
			$this->$galleryAction();
			
			// this is in order to open the popup as soon the page is reloaded
			$_REQUEST['OPEN_DEFAULT_POPUP'] = "galleryCategoriesEdit";
		}
		
		$_REQUEST['PAGE'] = "home";
	}
	
	public function doGet() {
		$_REQUEST['PAGE'] = "home";
	}
	
	private function hideCategory() {
		Context::getInstance()->galleryService->hideCategory($_REQUEST['category']);
	}
	
	private function showCategory() {
		Context::getInstance()->galleryService->showCategory($_REQUEST['category']);
	}
}

?>
