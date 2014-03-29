<?php

class LoginEditAction {
	
	public function execute() {
		if (!Context::getInstance()->authenticationService->isAdminUserLoggedIn()) {
			$_REQUEST['ERROR'] = "error.permissionDenied";
			return;
		}
		
		$_REQUEST['ERROR'] = "Operation not allowed in demo mode";
	}
	
}

?>
