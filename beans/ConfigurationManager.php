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
		file_put_contents(ConfigurationManager::$FILENAME, (serialize($this->configuration)));
	}

	private function load() {
		$datain = file_get_contents(ConfigurationManager::$FILENAME);
		return unserialize($datain);
	}
}
?>
