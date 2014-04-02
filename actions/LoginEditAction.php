<?php

class LoginEditAction {
	
	public function doPost() {
		if (!Context::getInstance()->authenticationService->isAdminUserLoggedIn()) {
			$_REQUEST['ERROR'] = "error.permissionDenied";
			return;
		}
		
		$email = $_POST['email'];
		$newPassword = $_POST['password'];
		$confirmPassword = $_POST['confirmPassword'];
		
		if ($newPassword != $confirmPassword) {
			$_REQUEST['ERROR'] = "login.passwordsDontMatch";
			$_REQUEST['PAGE'] = "login";
		} else {
			// change email and password
			Context::getInstance()->configurationService->getConfiguration()->accountEmail = $email;
			Context::getInstance()->configurationService->getConfiguration()->accountPassword = $newPassword;
			// save configuration
			Context::getInstance()->configurationService->save();
			
			$_SESSION['USERNAME'] = $email;
			$_REQUEST['MESSAGE'] = "login.accountChanged";
		}
	}
	
	public function doGet() {
		$_REQUEST['PAGE'] = "login";
	}
}

?>
