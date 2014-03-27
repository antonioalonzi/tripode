<?php
require_once("Configuration.php");
require_once("services/AuthenticationService.php");
require_once("services/ConfigurationService.php");
require_once("services/GalleryService.php");
require_once("services/TopMenuService.php");
require_once("services/TranslationService.php");

class Context {
	public static $instance;
	
    public $authenticationService;
    public $configurationService;
    public $galleryService;
    public $topMenuService;
    public $translationService;
    
    private function __construct() {
		$this->authenticationService = new AuthenticationService();
		$this->configurationService = new ConfigurationService();
		$this->galleryService = new GalleryService();
		$this->topMenuService = new TopMenuService();
		$this->translationService = new TranslationService();
	}
	
	public static function getInstance() {
		if (Context::$instance == null) {
			Context::$instance = new Context();
		}
		
		return Context::$instance;
	}
}
?>
