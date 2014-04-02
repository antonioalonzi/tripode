<?php

class LoginAction {
	
	public function doPost() {
		$email = $_POST['email'];
		$password = $_POST['password'];
		
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
		
		$email = "";
		if (Context::getInstance()->authenticationService->isAdminUserLoggedIn()) {
			$_REQUEST['PARAM_EMAIL'] = $_SESSION['USERNAME'];
		}
	}
}

?>
