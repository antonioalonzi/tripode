<?php
class Dispatcher {
	
	public static function dispatch() {
		Dispatcher::executeAction();
		Dispatcher::defineView();
	}
	
	private static function executeAction() {
		if (isset($_REQUEST['action'])) {
			$action = ucfirst($_REQUEST['action']."Action");
			
			$fileActionName = "actions/".$action.".php";
			if (file_exists($fileActionName)) {
				require_once($fileActionName);
				
				$actionClass = new $action();
				
				if ($_SERVER['REQUEST_METHOD'] === 'POST') {
					$actionClass->doPost();
				} else {
					$actionClass->doGet();
				}
				
			} else {
				$_REQUEST['ERROR'] = "Action $action does not exist.";
			}
		}
	}
	
	private static function defineView() {
		$page = 'home';
		if (isset($_REQUEST['page'])) {
			$page = $_REQUEST['page'];
		}
		
		// override the page with the one set by the action if any
		if (isset($_REQUEST['PAGE'])) {
			$page = $_REQUEST['PAGE'];
		}
		$pageFile = "pages/$page.php";
			
		if (!file_exists($pageFile)) {
			$_REQUEST['ERROR'] = "Page $page does not exist.";
			$page = "home";
			$pageFile = "pages/$page.php";
		}
		
		$_REQUEST['PAGE'] = $page;
		$_REQUEST['PAGE_FILE'] = $pageFile;
	}
}
?>
