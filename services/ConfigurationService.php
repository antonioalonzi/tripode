<?php
class ConfigurationService {

	private $configuration;

	public function __construct(){
		$this->configuration = new Configuration();
	}

	public function getConfiguration() {
		return $this->configuration;
	}
	
}
?>
