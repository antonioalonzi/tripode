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
		
		// When
		$galleryItem = new GalleryItem($filename);
		
		// Then
		$this->assertEquals("filename", $galleryItem->getName());
		$this->assertTrue($galleryItem->isHidden());
		$this->assertEquals(0, $galleryItem->getOrder());
		$this->assertEquals(".filename", $galleryItem->getFileName());
	}
	
	public function testConstructorPassingFilenameWithOrder() {
		// Given
		$filename = "[1]filename";
		
		// When
		$galleryItem = new GalleryItem($filename);
		
		// Then
		$this->assertEquals("filename", $galleryItem->getName());
		$this->assertFalse($galleryItem->isHidden());
		$this->assertEquals(1, $galleryItem->getOrder());
		$this->assertEquals("[1]filename", $galleryItem->getFileName());
	}
	
	public function testConstructorPassingFilenameWithBigNumberForOrder() {
		// Given
		$filename = "[9876]filename";
		
		// When
		$galleryItem = new GalleryItem($filename);
		
		// Then
		$this->assertEquals("filename", $galleryItem->getName());
		$this->assertFalse($galleryItem->isHidden());
		$this->assertEquals(9876, $galleryItem->getOrder());
		$this->assertEquals("[9876]filename", $galleryItem->getFileName());
	}
}
?>