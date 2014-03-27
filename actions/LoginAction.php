<?php

class LoginAction {
	
	public function execute() {
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		if ($email == Context::getInstance()->configuration->accountEmail && $password == Context::getInstance()->configuration->accountPassword) {
			$_REQUEST['MESSAGE'] = "login.loginSuccessful";
			$_REQUEST['PAGE'] = "home";
			$_SESSION['USERNAME'] = $email;
			
		} else {
			$_REQUEST['ERROR'] = "login.loginError";
			$_REQUEST['PAGE'] = "login";
		}
		
	}
	
}

?>
