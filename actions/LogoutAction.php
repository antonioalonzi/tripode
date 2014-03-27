<?php

class LogoutAction {
	
	public function execute() {
		session_start();
		session_unset();
		session_destroy();
		
		header("location:index.php");
		exit();
	}
	
}

?>
