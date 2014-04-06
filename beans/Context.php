<?php
require_once("Configuration.php");
require_once("beans/AuthenticationManager.php");
require_once("beans/ConfigurationManager.php");
require_once("beans/Dispatcher.php");
require_once("beans/FileSystemAdaptor.php");
require_once("beans/GalleryManager.php");
require_once("beans/PageService.php");
require_once("beans/TopMenuService.php");
require_once("beans/Translator.php");

/**
 * Define a context where all the singleton are stored.
 */
class Context {
	public static $instance;
	
	public $authenticationManager;
	public $configurationManager;
	public $fileSystemAdaptor;
	public $galleryManager;
	public $pageService;
	public $topMenuService;
	public $translator;
	
	private function __construct() {
		$this->authenticationManager = new AuthenticationManager();
		$this->configurationManager = new ConfigurationManager();
		$this->fileSystemAdaptor = new FileSystemAdaptor();
		$this->galleryManager = new GalleryManager();
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
