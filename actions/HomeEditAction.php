<?php

class HomeEditAction {
	
	public function doPost() {
		if (!Context::getInstance()->authenticationManager->isAdminUserLoggedIn()) {
			$_REQUEST['ERROR'] = "error.permissionDenied";
			return;
		}
		
		file_put_contents('pages/home.html', $_REQUEST['text']);
		$_REQUEST['MESSAGE'] = "home.message.homeModified";
	}
	
	public function doGet() {
		$_REQUEST['PAGE'] = "home";
	}
}

?>
