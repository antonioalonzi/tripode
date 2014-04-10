<?php

class LoginAction {
	
	public function doPost() {
		$email = $_REQUEST['email'];
		$password = $_REQUEST['password'];
		
		if (Context::getInstance()->authenticationManager->authenticate($email, $password)) {
			$_REQUEST['PAGE'] = "home";
			
		} else {
			$_REQUEST['PAGE'] = "login";
			$_REQUEST['PARAM_EMAIL'] = $email;
		}
	}
	
	public function doGet() {
		$_REQUEST['PAGE'] = "login";
		
		$_REQUEST['PARAM_EMAIL'] = "";
		if (Context::getInstance()->authenticationManager->isAdminUserLoggedIn()) {
			$_REQUEST['PARAM_EMAIL'] = $_SESSION['USERNAME'];
		}
	}
}

?>
