<?php

class BannerManager {
	public static $NONE = "None";
	
	private $banner;
	
	public function __construct($banner) {
		$this->banner = $banner;
	}
	
	public function hasBanner() {
		return isset($this->banner) && $this->banner != BannerManager::$NONE;
	}
	
	public function getBanner() {
		return $this->banner;
	}
}
?>
