<?php

/**
 * The filename contains hidden, position and itemName information with the following format:
 *    <hidden>[<position>]<name>
 *
 *    - hidden is represented as a "." at the beginning of the file;
 *    - position is a positive integer number between square brackets;
 *    - name is the rest of the string
 *
 *     examples:
 *        [1]myItem                 ->   not hidden item with name "myItem" at position 1
 *        .[2]myHiddenItem          ->   hidden item with name "myHiddenItem" at position 2
 *
 * See GalleryItemTest for more examples and tests.
 */
class GalleryItem {
	private $name;
	private $position;
	private $hidden;
	
	public function __construct($filename) {
		$newFilename = $this->setHiddenFromFilename($filename);
		$newFilename = $this->setPositionFromFilename($newFilename);
		$this->name = $newFilename;
	}
	
	public function increasePosition() {
		$this->position++;
	}
	
	public function decreasePosition() {
		if ($this->position > 0) {
			$this->position--;
		}
	}
	
	public function getName() {
		return $this->name;
	}
	
	public function setName($name) {
		$name = str_replace("[", "_", $name);
		$name = str_replace("]", "_", $name);
		$name = str_replace("|", "_", $name);
		$name = preg_replace("/^\./", "_", $name);
		$this->name = $name;
	}
	
	public function getPosition() {
		return $this->position;
	}
	
	public function isHidden() {
		return $this->hidden;
	}
	
	public function getFileName() {
		if ($this->hidden) {
			$uriParameter = ".";
		} else {
			$uriParameter = "";
		}
		
		if (is_int($this->position)) {
			$uriParameter .= "[".$this->position."]";
		}
		
		$uriParameter .= $this->name;
		
		return $uriParameter;
	}
	
	private function setHiddenFromFilename($filename) {
		if (strpos($filename, ".") === 0) {
			$this->hidden = true;
			return substr($filename, 1);
		} else {
			$this->hidden = false;
			return $filename;
		}
	}
	
	private function setPositionFromFilename($filename) {
		if (strpos($filename, "[") === 0) {
			
			$closeParentesis = strpos($filename, "]");
			if ($closeParentesis > 0) {
				$positionString = substr($filename, 1, $closeParentesis-1);
				if (ctype_digit($positionString)) {
					$this->position = intval($positionString);
					return substr($filename, $closeParentesis+1);
				}
			}
			
			return $filename;
		} else {
			return $filename;
		}
	}
	
	public static function positionComparator($a, $b) {
		return strcmp($a->position, $b->position);
	}
}
?>
