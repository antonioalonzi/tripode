<?php
require_once('beans/GalleryItem.php');

class GalleryManager {
	
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
		
		$categories = $this->orderByPosition($categories);
		
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
			file_put_contents($fileIndex, Context::getInstance()->translator->translate("gallery.defaultIndexMessage"));
		}
		include $fileIndex;
	}
	
	public function hideCategory($categoryFilename) {
		rename("gallery/".$categoryFilename, "gallery/.".$categoryFilename);
	}
	
	public function showCategory($categoryFilename) {
		rename("gallery/".$categoryFilename, "gallery/".substr($categoryFilename, 1));
	}
	
	public function moveCategory($categoryFilename, $upOrDown) {
		$categories = $this->getGalleryCategories(true);
		$categoryItem = $this->getGalleryItemByFilename($categories, $categoryFilename);
		if ($upOrDown == "up") {
			$categoryItem->decreasePosition();
		} elseif ($upOrDown == "down") {
			$categoryItem->increasePosition();
		}
		rename("gallery/".$categoryFilename, "gallery/".$categoryItem->getFileName());
	}
	
	/**
	 * Orders the gallery items by position
	 * @param array $galleryItems
	 * @return array
	 */
	public function orderByPosition($galleryItems) {
		usort($galleryItems, array('GalleryItem','positionComparator'));
		return $galleryItems;
	}
	
	/**
	 * Filters out all hidden items from a list
	 * @param array $galleryItems
	 * @return array
	 */
	public function filterOutHidden($galleryItems) {
		$filteredItems = array();
		
		foreach ($galleryItems as $item) {
			if (!$item->isHidden()) {
				$filteredItems[] = $item;
			}
		}
		
		return $filteredItems;
	}
	
	/**
	 * Find a galleryItem into a list by filename
	 * @param array $items
	 * @param string $itemName
	 * @return GalleryItem
	 */
	public function getGalleryItemByFilename($items, $itemFilename) {
		foreach ($items as $item) {
			if ($item->getFilename() == $itemFilename) {
				return $item;
			}
		}
	}
}
?>
