<?php
class GalleryService {
	
	public function getGalleryCategories($includeHidden = false) {
		$categories = array();
		
		if (!file_exists('gallery')) {
			mkdir('gallery');
		}
		
		// read all directories
		if ($handle = opendir('gallery')) {
			$blacklist = array('.', '..');
			while (false !== ($file = readdir($handle))) {
				if (!in_array($file, $blacklist)) {
					$categories[] = $file;
				}
			}
			closedir($handle);
		}
		
		return $categories;
	}
	
	public function getImagesWithinCategory($category) {
		$images = array();
		
		// read all directories
		if ($handle = opendir("gallery/$category")) {
			$blacklist = array('.', '..', 'thumbs', 'index.html');
			while (false !== ($file = readdir($handle))) {
				if (!in_array($file, $blacklist)) {
					$images[] = $file;
				}
			}
			closedir($handle);
		}
		
		return $images;
	}
	
	public function includeCategoryIndex() {
		$fileIndex = "gallery/".$_GET['category']."/index.html";
		if (!file_exists($fileIndex)) {
			file_put_contents($fileIndex, Context::getInstance()->translationService->translate("gallery.defaultIndexMessage"));
		}
		include $fileIndex;
	}
	
	public function hide($category) {
		rename("gallery/".$category, "gallery/.".$category);
	}
}
?>
