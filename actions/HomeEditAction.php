<?php

class HomeEditAction {
	
	public function execute() {
		
		if (!Context::getInstance()->authenticationService->isAdminUserLoggedIn()) {
			$_REQUEST['ERROR'] = "error.permissionDenied";
			return;
		}

		file_put_contents('pages/home.html', $_POST['text']);
		$_REQUEST['MESSAGE'] = "home.message.homeModified";
	}
	
}

?>
