<?php
class DispatcherService {
	
	public static function dispatch() {
		DispatcherService::executeAction();
		DispatcherService::defineView();
	}
	
	private static function executeAction() {
		if (isset($_REQUEST['action'])) {
			$action = ucfirst($_REQUEST['action']."Action");
			
			$fileActionName = "actions/".$action.".php";
			if (Context::getInstance()->fileSystemService->fileExists($fileActionName)) {
				Context::getInstance()->fileSystemService->requireOnce($fileActionName);
				
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
			
		if (!Context::getInstance()->fileSystemService->fileExists($pageFile)) {
			$_REQUEST['ERROR'] = "Page $page does not exist.";
			$page = "home";
			$pageFile = "pages/$page.php";
		}
		
		$_REQUEST['PAGE'] = $page;
		$_REQUEST['PAGE_FILE'] = $pageFile;
	}
}
?>
