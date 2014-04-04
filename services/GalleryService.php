<?php
require_once('model/GalleryItem.php');

class GalleryService {
	
	public function getGalleryCategories($includeHidden = false) {
		$categories = array();
		
		if (!file_exists('gallery')) {
			mkdir('gallery');
		}
		
		// read all directories
		if ($handle = opendir('gallery')) {
			$blacklist = array('.', '..');
			while (false !== ($category = readdir($handle))) {
				if (!in_array($category, $blacklist)) {
					$categories[] = new GalleryItem($category);
				}
			}
			closedir($handle);
		}
		
		if (!$includeHidden) {
			$categories = $this->filterOutHidden($categories);
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
		$fileIndex = "gallery/".$_REQUEST['category']."/index.html";
		if (!file_exists($fileIndex)) {
			file_put_contents($fileIndex, Context::getInstance()->translationService->translate("gallery.defaultIndexMessage"));
		}
		include $fileIndex;
	}
	
	public function hide($category) {
		rename("gallery/".$category, "gallery/.".$category);
	}
	
	public function show($category) {
		rename("gallery/.".$category, "gallery/".$category);
	}
	
	private function filterOutHidden($galleryItems) {
		$filteredItems = array();
		
		foreach ($galleryItems as $item) {
			if (!$item->isHidden()) {
				$filteredItems[] = $item;
			}
		}
		
		return $filteredItems;
	}
}
?>
