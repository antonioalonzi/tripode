<?php

class WebsiteEditAction {
	
	public function doPost() {
		
		if (!Context::getInstance()->authenticationService->isAdminUserLoggedIn()) {
			$_REQUEST['ERROR'] = "error.permissionDenied";
			return;
		}
		
		// change configuration
		Context::getInstance()->configurationService->getConfiguration()->name = $_POST['name'];
		Context::getInstance()->configurationService->getConfiguration()->description = $_POST['description'];
		Context::getInstance()->configurationService->getConfiguration()->author = $_POST['author'];
		Context::getInstance()->configurationService->getConfiguration()->lang = $_POST['lang'];
		
		// save configuration
		Context::getInstance()->configurationService->save();
		
		$_REQUEST['MESSAGE'] = "website.configurationChanged";
	}
	
	public function doGet() {
		$_REQUEST['PAGE'] = "home";
	}
}

?>
