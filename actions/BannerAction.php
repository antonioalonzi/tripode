<?php

class BannerAction {
	
	public function doPost() {
		if (!Context::getInstance()->authenticationManager->isAdminUserLoggedIn()) {
			$_REQUEST['ERROR'] = "error.permissionDenied";
			return;
		}
		
		if (isset($_REQUEST['bannerAction'])) {
			$bannerAction = $_REQUEST['bannerAction'];
			$this->$bannerAction();
		}
	}
	
	public function doGet() {
		$_REQUEST['PAGE'] = "home";
	}
	
	
	
	public function setBanner() {
		Context::getInstance()->bannerManager->setBanner($_REQUEST['banner']);
	}
}

?>
