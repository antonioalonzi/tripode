<?php
class AuthenticationService {

	public function authenticate($email, $password) {
		if ($email == Context::getInstance()->configurationService->getConfiguration()->accountEmail && $password == Context::getInstance()->configurationService->getConfiguration()->accountPassword) {
			$_SESSION['USERNAME'] = $email;
			$_REQUEST['MESSAGE'] = "login.loginSuccessful";
			
		} else {
			$_REQUEST['ERROR'] = "login.loginError";
			return false;
		}
	}
	
	public function isAdminUserLoggedIn() {
		if (isset($_SESSION['USERNAME']) && $_SESSION['USERNAME'] == Context::getInstance()->configurationService->getConfiguration()->accountEmail) {
			return true;
		}
		return false;
	}
	
	public function isDefaultPassword() {
		if (Context::getInstance()->configurationService->getConfiguration()->accountEmail == "admin" && Context::getInstance()->configurationService->getConfiguration()->accountPassword == "admin") {
			return true;
		}
		return false;
	}
}
?>

