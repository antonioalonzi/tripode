<?php
class TopMenuManager {
	
	public $PAGES = array("home", "contacts", "login", "logout");
	
	public function isActive($menuItem) {
		if ($menuItem == $_REQUEST['PAGE']) {
			return "current active";
		}
	}
	
	public function hasCurrentPage() {
		$page = $_REQUEST['PAGE'];
		
		if (in_array($page, $this->PAGES)) {
			return true;
		}
		
		return false;
	}
}
?>
