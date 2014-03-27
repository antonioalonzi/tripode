<?php
require_once("Configuration.php");
require_once("services/TopMenuService.php");
require_once("services/TranslationService.php");
require_once("services/GalleryService.php");
require_once("services/AuthenticationService.php");

class Context {
	public static $instance;
	
	// beans
    public $configuration;
    
    // services
    public $topMenuService;
    public $translationService;
    public $galleryService;
    public $authenticationService;
    
    private function __construct() {
		$this->configuration = new Configuration(); 
		$this->topMenuService = new TopMenuService();
		$this->translationService = new TranslationService();
		$this->galleryService = new GalleryService();
		$this->authenticationService = new AuthenticationService();
	}
	
	public static function getInstance() {
		if (Context::$instance == null) {
			Context::$instance = new Context();
		}
		
		return Context::$instance;
	}
}
?>
