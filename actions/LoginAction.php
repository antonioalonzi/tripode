<?php

class LoginAction {
	
	public function doPost() {
		$email = $_REQUEST['email'];
		$password = $_REQUEST['password'];
		
		if ($email == Context::getInstance()->configurationService->getConfiguration()->accountEmail && $password == Context::getInstance()->configurationService->getConfiguration()->accountPassword) {
			$_REQUEST['MESSAGE'] = "login.loginSuccessful";
			$_REQUEST['PAGE'] = "home";
			$_SESSION['USERNAME'] = $email;
			
		} else {
			$_REQUEST['ERROR'] = "login.loginError";
			$_REQUEST['PAGE'] = "login";
			$_REQUEST['PARAM_EMAIL'] = $_SESSION['USERNAME'];
		}
	}
	
	public function doGet() {
		$_REQUEST['PAGE'] = "login";
		
		$_REQUEST['PARAM_EMAIL'] = "";
		if (Context::getInstance()->authenticationService->isAdminUserLoggedIn()) {
			$_REQUEST['PARAM_EMAIL'] = $_SESSION['USERNAME'];
		}
	}
}

?>
