<?php
require_once("Configuration.php");
require_once("beans/AuthenticationService.php");
require_once("beans/ConfigurationService.php");
require_once("beans/Dispatcher.php");
require_once("beans/FileSystemService.php");
require_once("beans/GalleryService.php");
require_once("beans/PageService.php");
require_once("beans/TopMenuService.php");
require_once("beans/Translator.php");

/**
 * Define a context where all the singleton are stored.
 */
class Context {
	public static $instance;
	
	public $authenticationService;
	public $configurationService;
	public $fileSystemService;
	public $galleryService;
	public $pageService;
	public $topMenuService;
	public $translator;
	
	private function __construct() {
		$this->authenticationService = new AuthenticationService();
		$this->configurationService = new ConfigurationService();
		$this->fileSystemService = new FileSystemService();
		$this->galleryService = new GalleryService();
		$this->pageService = new PageService();
		$this->topMenuService = new TopMenuService();
		$this->translator = new Translator();
	}
	
	/**
	 * Returns the instance of the context.
	 * If the context does not exist yet then it creates it.
	 *
	 * @return Context
	 */
	public static function getInstance() {
		if (Context::$instance == null) {
			Context::$instance = new Context();
		}
		
		return Context::$instance;
	}
	
}
?>
