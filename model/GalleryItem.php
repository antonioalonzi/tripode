<?php
class GalleryItem {
	private $name;
	private $order;
	private $hidden;
	
	public function __construct($name) {
		$newName = $this->setHiddenFromName($name);
		$newName = $this->setOrderFromName($newName);
		$this->name = $newName;
	}
	
	public function getName() {
		return $this->name;
	}
	
	public function getOrder() {
		return $this->order;
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
		
		if (ctype_digit($this->order)) {
			$uriParameter .= "[".$this->order."]";
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
	
	private function setOrderFromName($name) {
		if (strpos($name, "[") === 0) {
			
			$closeParentesis = strpos($name, "]");
			if ($closeParentesis > 0) {
				$orderString = substr($name, 1, $closeParentesis-1);
				if (ctype_digit($orderString)) {
					$this->order = $orderString;
					return substr($name, $closeParentesis+1);
				}
			}
			
			return $name;
		} else {
			$this->order = 0;
			return $name;
		}
	}
}
?>
