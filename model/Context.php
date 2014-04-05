<?php
require_once("Configuration.php");
require_once("model/AuthenticationService.php");
require_once("model/ConfigurationService.php");
require_once("model/DispatcherService.php");
require_once("model/FileSystemService.php");
require_once("model/GalleryService.php");
require_once("model/PageService.php");
require_once("model/TopMenuService.php");
require_once("model/TranslationService.php");

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
	public $translationService;
	
	private function __construct() {
		$this->authenticationService = new AuthenticationService();
		$this->configurationService = new ConfigurationService();
		$this->fileSystemService = new FileSystemService();
		$this->galleryService = new GalleryService();
		$this->pageService = new PageService();
		$this->topMenuService = new TopMenuService();
		$this->translationService = new TranslationService();
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
