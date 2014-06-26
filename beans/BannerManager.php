<?php

class BannerManager {
	public static $NONE = "None";
	
	public function hasBanner() {
		$banner = Context::getInstance()->configurationManager->getConfiguration()->banner;
		return isset($banner) && $banner != BannerManager::$NONE;
	}
	
	public function getBanner() {
		return Context::getInstance()->configurationManager->getConfiguration()->banner;
	}
}
?>
