<?php

class LogoutAction {
	
	public function doPost() {
		session_start();
		session_unset();
		session_destroy();
		
		header("location:index.php");
		exit();
	}
	
	public function doGet() {
		$this->doPost();
	}
}

?>
