<?php
class GalleryItem {
	private $name;
	private $order;
	private $hidden;
	
	public function __construct($name) {
		$this->name = $name;
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
}
?>
