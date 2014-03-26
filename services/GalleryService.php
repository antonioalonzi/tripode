<?php
class GalleryService {
	
	public function getGalleryCategories() {
		$categories = array();
		
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
	
}
?>
