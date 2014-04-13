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
		}
	}
	
	public function doGet() {
		$_REQUEST['PAGE'] = "home";
	}
	
	private function hideCategory() {
		Context::getInstance()->galleryManager->hideCategory($_REQUEST['category']);
		$this->reopenGalleryEditPopup();
	}
	
	private function showCategory() {
		Context::getInstance()->galleryManager->showCategory($_REQUEST['category']);
		$this->reopenGalleryEditPopup();
	}
	
	private function downCategory() {
		Context::getInstance()->galleryManager->moveCategory($_REQUEST['category'], 'down');
		$this->reopenGalleryEditPopup();
	}
	
	private function upCategory() {
		Context::getInstance()->galleryManager->moveCategory($_REQUEST['category'], 'up');
		$this->reopenGalleryEditPopup();
	}
	
	private function addCategory() {
		$category = new GalleryItem($_REQUEST['position'].$_REQUEST['categoryName']);
		Context::getInstance()->galleryManager->addCategory($category);
		$this->reopenGalleryEditPopup();
	}
	
	private function categoryTextEdit() {
		Context::getInstance()->galleryManager->changeCategoryDescription($_REQUEST['category'], $_REQUEST['text']);
		$this->showGalleryCategory();
	}
	
	private function reopenGalleryEditPopup() {
		// this is in order to open the popup as soon the page is reloaded
		$_REQUEST['OPEN_DEFAULT_POPUP'] = "galleryCategoriesEdit";
		$_REQUEST['PAGE'] = "home";
	}
	
	private function showGalleryCategory() {
		$_REQUEST['PAGE'] = "gallery";
	}
}

?>
