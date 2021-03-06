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
	
	
	
	// categories
	public function hideCategory() {
		Context::getInstance()->galleryManager->hideCategory($_REQUEST['category']);
		$this->reopenGalleryEditPopup();
	}
	
	public function showCategory() {
		Context::getInstance()->galleryManager->showCategory($_REQUEST['category']);
		$this->reopenGalleryEditPopup();
	}
	
	public function downCategory() {
		Context::getInstance()->galleryManager->moveCategory($_REQUEST['category'], 'down');
		$this->reopenGalleryEditPopup();
	}
	
	public function upCategory() {
		Context::getInstance()->galleryManager->moveCategory($_REQUEST['category'], 'up');
		$this->reopenGalleryEditPopup();
	}
	
	public function addCategory() {
		$categoryName = GalleryItem::galleryItemName($_REQUEST['categoryName']);
		$category = new GalleryItem("[".$_REQUEST['position']."]".$categoryName);
		Context::getInstance()->galleryManager->addCategory($category);
		$this->reopenGalleryEditPopup();
	}
	
	public function renameCategory() {
		$category = new GalleryItem($_REQUEST['oldFilename']);
		Context::getInstance()->galleryManager->renameCategory($category, $_REQUEST['newCategoryName']);
		$this->reopenGalleryEditPopup();
	}
	
	public function deleteCategory() {
		Context::getInstance()->galleryManager->deleteCategory($_REQUEST['category']);
		$this->reopenGalleryEditPopup();
	}
	
	public function categoryTextEdit() {
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
	
	
	
	// images
	public function rightImage() {
		Context::getInstance()->galleryManager->moveImage($_REQUEST['category'], $_REQUEST['image'], 'right');
		$_REQUEST['PAGE'] = "gallery";
	}
	
	public function leftImage() {
		Context::getInstance()->galleryManager->moveImage($_REQUEST['category'], $_REQUEST['image'], 'left');
		$_REQUEST['PAGE'] = "gallery";
	}
	
	public function hideImage() {
		Context::getInstance()->galleryManager->hideImage($_REQUEST['category'], $_REQUEST['image']);
		$_REQUEST['PAGE'] = "gallery";
	}
	
	public function showImage() {
		Context::getInstance()->galleryManager->showImage($_REQUEST['category'], $_REQUEST['image']);
		$_REQUEST['PAGE'] = "gallery";
	}
	
	public function deleteImage() {
		Context::getInstance()->galleryManager->deleteImage($_REQUEST['category'], $_REQUEST['image']);
		$_REQUEST['PAGE'] = "gallery";
	}
	
	public function renameImage() {
		$filename = new GalleryItem($_REQUEST['renameOldFileName']);
		Context::getInstance()->galleryManager->renameImage($_REQUEST['category'], $filename, $_REQUEST['renameNewName']);
		$_REQUEST['PAGE'] = "gallery";
	}
	
	public function uploadPhotos() {
		$position = $_REQUEST['position'];
		for($i = 0; $i < count($_FILES['uploadPhotos']['name']); $i++) {
			$imageName = GalleryItem::galleryItemName($_FILES["uploadPhotos"]['name'][$i]);
			Context::getInstance()->galleryManager->moveUploadedPhoto($position++, $_FILES['uploadPhotos']['tmp_name'][$i], $_REQUEST['category'], $imageName);
		}
		
		$_REQUEST['PAGE'] = "gallery";
	}
}

?>
