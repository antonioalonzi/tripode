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
	
	public function setBanner($banner) {
		Context::getInstance()->configurationManager->getConfiguration()->banner = $banner;
		Context::getInstance()->configurationManager->save();
	}
	
	public function deleteBanner($banner) {
		unlink("img/banners/".$banner);
	}
	
	public function getAllBanners() {
		$banners = array();
		
		// read all files
		if ($handle = opendir('img/banners')) {
			$blacklist = array('.', '..');
			while (false !== ($file = readdir($handle))) {
				if (!in_array($file, $blacklist)) {
					$banners[] = $file;
				}
			}
			$handle = closedir($handle);
		}
		
		return $banners;
	}
}
?>
