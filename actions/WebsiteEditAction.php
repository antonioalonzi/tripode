<?php

class WebsiteEditAction {
	
	public function doPost() {
		if (!Context::getInstance()->authenticationService->isAdminUserLoggedIn()) {
			$_REQUEST['ERROR'] = "error.permissionDenied";
			return;
		}
		
		// change configuration
		Context::getInstance()->configurationService->getConfiguration()->websiteName = $_REQUEST['name'];
		Context::getInstance()->configurationService->getConfiguration()->websiteDescription = $_REQUEST['description'];
		Context::getInstance()->configurationService->getConfiguration()->websiteAuthor = $_REQUEST['author'];
		Context::getInstance()->configurationService->getConfiguration()->websiteLang = $_REQUEST['lang'];
		
		// save configuration
		Context::getInstance()->configurationService->save();
		
		$_REQUEST['MESSAGE'] = "website.configurationChanged";
	}
	
	public function doGet() {
		$_REQUEST['PAGE'] = "home";
	}
}

?>
