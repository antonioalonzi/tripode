<?php

class LoginEditAction {
	
	public function doPost() {
		if (!Context::getInstance()->authenticationService->isAdminUserLoggedIn()) {
			$_REQUEST['ERROR'] = "error.permissionDenied";
			return;
		}
		
		$_REQUEST['ERROR'] = "Operation not allowed in demo mode";
	}
	
	public function doGet() {
		$_REQUEST['PAGE'] = "login";
	}
}

?>
