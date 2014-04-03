<?php

class GalleryAction {
	
	public function doPost() {
		// TODO implements
	}
	
	public function doGet() {
		if (isset($_GET['galleryAction'])) {
			$galleryAction = $_GET['galleryAction'];
			$this->$galleryAction();
			
		}
		
		$_REQUEST['PAGE'] = "home";
	}
	
	private function hide() {
		Context::getInstance()->galleryService->hide($_GET['category']);
	}
}

?>
