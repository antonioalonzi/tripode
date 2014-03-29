<?php

class LoginEditAction {
	
	public function execute() {
		$email = $_POST['email'];
		$newPassword = $_POST['password'];
		$confirmPassword = $_POST['confirmPassword'];
		
		if ($newPassword != $confirmPassword) {
			$_REQUEST['ERROR'] = "login.passwordsDontMatch";
			$_REQUEST['PAGE'] = "login";
		} else {
			Context::getInstance()->configurationService->save();
		}
	}
	
}

?>
