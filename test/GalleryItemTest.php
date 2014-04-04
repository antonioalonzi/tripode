<?php
require_once("model/Context.php");

class GalleryItemTest extends PHPUnit_Framework_TestCase {

	public function testConstructorPassingSimpleFilename() {
		// Given
		$filename = "filename";
		
		// when
		$galleryItem = new GalleryItem($filename);
		
		// Assert
		$this->assertEquals("filename", $galleryItem->getName());
		$this->assertFalse($galleryItem->isHidden());
		$this->assertEquals(0, $galleryItem->getOrder());
		$this->assertEquals("filename", $galleryItem->getFileName());
	}
	
	public function testConstructorPassingHiddenFilename() {
		// Given
		$filename = ".filename";
	
		// when
		$galleryItem = new GalleryItem($filename);
	
		// Assert
		$this->assertEquals("filename", $galleryItem->getName());
		$this->assertTrue($galleryItem->isHidden());
		$this->assertEquals(0, $galleryItem->getOrder());
		$this->assertEquals(".filename", $galleryItem->getFileName());
	}
}
?>