<?php
class AuthenticationService {
	
	public function isAdminUserLoggedIn() {
		if (isset($_SESSION['USERNAME']) && $_SESSION['USERNAME'] == Context::getInstance()->configurationService->getConfiguration()->accountEmail) {
			return true;
		}
		return false;
	}

}
?>

