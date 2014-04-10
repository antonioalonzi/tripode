<?php

class GalleryAction {
	
	public function doPost() {
		if (!Context::getInstance()->authenticationManager->isAdminUserLoggedIn()) {
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
		Context::getInstance()->galleryManager->hideCategory($_REQUEST['category']);
	}
	
	private function showCategory() {
		Context::getInstance()->galleryManager->showCategory($_REQUEST['category']);
	}
	
	private function downCategory() {
		Context::getInstance()->galleryManager->moveCategory($_REQUEST['category'], 'down');
	}
	
	private function upCategory() {
		Context::getInstance()->galleryManager->moveCategory($_REQUEST['category'], 'up');
	}
	
	private function addCategory() {
		$category = new GalleryItem($_REQUEST['position'].$_REQUEST['categoryName']);
		Context::getInstance()->galleryManager->addCategory($category);
	}
}

?>
