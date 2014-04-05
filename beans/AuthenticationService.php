<?php
class AuthenticationService {
	
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

