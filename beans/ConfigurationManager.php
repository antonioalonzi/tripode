<?php
class ConfigurationManager {

	private static $FILENAME = "data/configuration.txt";
	private $configuration;

	public function __construct(){
		$this->configuration = $this->load();
	}

	public function getConfiguration() {
		return $this->configuration;
	}

	public function save() {
		$result = file_put_contents(ConfigurationManager::$FILENAME, (serialize($this->configuration)));
		
		if ($result) {
			$_REQUEST['MESSAGE'] = "website.configurationChanged";
		} else {
			$_REQUEST['ERROR'] = "website.configurationError";
		}
	}

	private function load() {
		if (file_exists(ConfigurationManager::$FILENAME)) {
			$datain = file_get_contents(ConfigurationManager::$FILENAME);
			return unserialize($datain);
		} else {
			return new Configuration();
		}
	}
}
?>
