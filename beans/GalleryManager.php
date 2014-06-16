<?php
require_once('beans/GalleryItem.php');

class GalleryManager {
	
	/**
	 * returns a list of categories from the filesystem
	 * @param boolean $includeHidden
	 * @return array
	 */
	public function getGalleryCategories($includeHidden = false) {
		$categories = array();
		
		if (!file_exists('gallery')) {
			mkdir('gallery');
		}
		
		// read all directories
		if ($handle = opendir('gallery')) {
			$blacklist = array('.', '..');
			while (false !== ($directory = readdir($handle))) {
				if (!in_array($directory, $blacklist)) {
					$categories[] = new GalleryItem($directory);
				}
			}
			$handle = closedir($handle);
		}
		
		if (!$includeHidden) {
			$categories = $this->filterOutHidden($categories);
		}
		
		$categories = $this->orderByPosition($categories);
		
		return $categories;
	}
	
	/**
	 * returns a list of images within a category from the filesystem
	 * @param category category to browse
	 * @param boolean $includeHidden
	 * @return array
	 */
	public function getImagesWithinCategory($category, $includeHidden = false) {
		$images = array();
		
		// read all directories
		if ($handle = opendir("gallery/$category")) {
			$blacklist = array('.', '..', 'thumbs', 'index.html');
			while (false !== ($file = readdir($handle))) {
				if (!in_array($file, $blacklist)) {
					$images[] = new GalleryItem($file);
				}
			}
			closedir($handle);
		}
		
		if (!$includeHidden) {
			$images = $this->filterOutHidden($images);
		}
		
		$images = $this->orderByPosition($images);
		
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
	
	public function moveImage($category, $imageFilename, $rightOrLeft) {
		$images = $this->getImagesWithinCategory($category, true);
		$imageItem = $this->getGalleryItemByFilename($images, $imageFilename);
		if ($rightOrLeft == "left") {
			$imageItem->decreasePosition();
		} elseif ($rightOrLeft == "right") {
			$imageItem->increasePosition();
		}
		
		rename("gallery/".$category."/".$imageFilename, "gallery/".$category."/".$imageItem->getFileName());
		rename("gallery/".$category."/thumbs/".$imageFilename, "gallery/".$category."/thumbs/".$imageItem->getFileName());
	}
	
	public function hideImage($category, $imageFilename) {
		rename("gallery/".$category."/".$imageFilename, "gallery/".$category."/.".$imageFilename);
		rename("gallery/".$category."/thumbs/".$imageFilename, "gallery/".$category."/thumbs/.".$imageFilename);
	}
	
	public function showImage($category, $imageFilename) {
		rename("gallery/".$category."/".$imageFilename, "gallery/".$category."/".substr($imageFilename, 1));
		rename("gallery/".$category."/thumbs/".$imageFilename, "gallery/".$category."/thumbs/".substr($imageFilename, 1));
	}
	
	public function addCategory($category) {
		mkdir('gallery/'.$category->getFilename());
	}
	
	public function renameCategory($category, $newCategoryName) {
		if ($category->getName() != $newCategoryName) {
			$oldFilename = $category->getFilename();
			$category->setName($newCategoryName);
			rename('gallery/'.$oldFilename, 'gallery/'.$category->getFilename());
		}
	}
	
	public function deleteCategory($category) {
		$this->deleteDirectory('gallery/'.$category);
	}
	
	public function changeCategoryDescription($category, $text) {
		file_put_contents('gallery/'.$category.'/index.html', $text);
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
	
	/**
	 * Find a galleryItem into a list by position
	 * @param array $items
	 * @param int $position
	 * @return GalleryItem
	 */
	public function getGalleryItemByPosition($items, $position) {
		foreach ($items as $item) {
			if ($item->getPosition() == $position) {
				return $item;
			}
		}
	}
	
	private function deleteDirectory($dir) {
		if (!file_exists($dir)) return true;
		if (!is_dir($dir)) return unlink($dir);
		foreach (scandir($dir) as $item) {
			if ($item == '.' || $item == '..') continue;
			if (!$this->deleteDirectory($dir.DIRECTORY_SEPARATOR.$item)) return false;
		}
		return rmdir($dir);
	}
}
?>
