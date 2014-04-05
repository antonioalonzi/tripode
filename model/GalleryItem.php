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
	
	public function __construct($name) {
		$newName = $this->setHiddenFromName($name);
		$newName = $this->setPositionFromName($newName);
		$this->name = $newName;
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
	
	private function setHiddenFromName($name) {
		if (strpos($name, ".") === 0) {
			$this->hidden = true;
			return substr($name, 1);
		} else {
			$this->hidden = false;
			return $name;
		}
	}
	
	private function setPositionFromName($name) {
		if (strpos($name, "[") === 0) {
			
			$closeParentesis = strpos($name, "]");
			if ($closeParentesis > 0) {
				$positionString = substr($name, 1, $closeParentesis-1);
				if (ctype_digit($positionString)) {
					$this->position = intval($positionString);
					return substr($name, $closeParentesis+1);
				}
			}
			
			return $name;
		} else {
			return $name;
		}
	}
	
	public static function positionComparator($a, $b) {
		return strcmp($a->position, $b->position);
	}
}
?>
