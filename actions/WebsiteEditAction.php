<?php

class WebsiteEditAction {
	
	public function doPost() {
		if (!Context::getInstance()->authenticationManager->isAdminUserLoggedIn()) {
			$_REQUEST['ERROR'] = "error.permissionDenied";
			return;
		}
		
		// change configuration
		Context::getInstance()->configurationManager->getConfiguration()->websiteName = $_REQUEST['name'];
		Context::getInstance()->configurationManager->getConfiguration()->websiteDescription = $_REQUEST['description'];
		Context::getInstance()->configurationManager->getConfiguration()->websiteAuthor = $_REQUEST['author'];
		Context::getInstance()->configurationManager->getConfiguration()->websiteLang = $_REQUEST['lang'];
		
		// save configuration
		Context::getInstance()->configurationManager->save();
		
		$_REQUEST['MESSAGE'] = "website.configurationChanged";
	}
	
	public function doGet() {
		$_REQUEST['PAGE'] = "home";
	}
}

?>
