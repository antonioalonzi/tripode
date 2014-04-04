<?php
class GalleryItem {
	private $name;
	private $order;
	private $hidden;
	
	public function __construct($name) {
		$newName = $this->setHiddenFromName($name);
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
	
	private function setHiddenFromName($name) {
		if (strpos($name, ".") === 0) {
			$this->hidden = true;
			return substr($name, 1);
		} else {
			$this->hidden = false;
			return $name;
		}
	}
}
?>
