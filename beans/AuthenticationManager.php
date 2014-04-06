<?php
class AuthenticationManager {

	public function authenticate($email, $password) {
		if ($email == Context::getInstance()->configurationManager->getConfiguration()->accountEmail && $password == Context::getInstance()->configurationManager->getConfiguration()->accountPassword) {
			$_SESSION['USERNAME'] = $email;
			$_REQUEST['MESSAGE'] = "login.loginSuccessful";
			
		} else {
			$_REQUEST['ERROR'] = "login.loginError";
			return false;
		}
	}
	
	public function isAdminUserLoggedIn() {
		if (isset($_SESSION['USERNAME']) && $_SESSION['USERNAME'] == Context::getInstance()->configurationManager->getConfiguration()->accountEmail) {
			return true;
		}
		return false;
	}
	
	public function isDefaultPassword() {
		if (Context::getInstance()->configurationManager->getConfiguration()->accountEmail == "admin" && Context::getInstance()->configurationManager->getConfiguration()->accountPassword == "admin") {
			return true;
		}
		return false;
	}
}
?>

