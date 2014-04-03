<?php

class GalleryAction {
	
	public function doPost() {
		if (isset($_REQUEST['galleryAction'])) {
			$galleryAction = $_REQUEST['galleryAction'];
			$this->$galleryAction();
		}
		
		$_REQUEST['PAGE'] = "home";
	}
	
	public function doGet() {
		$_REQUEST['PAGE'] = "home";
	}
	
	private function hide() {
		Context::getInstance()->galleryService->hide($_REQUEST['category']);
	}
	
	private function show() {
		Context::getInstance()->galleryService->show($_REQUEST['category']);
	}
}

?>
