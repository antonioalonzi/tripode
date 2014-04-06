<?php
require_once("test/bootstrap.php");

class GalleryItemTest extends PHPUnit_Framework_TestCase {

	public function testConstructorPassingSimpleFilename() {
		// Given
		$filename = "filename";
		
		// when
		$galleryItem = new GalleryItem($filename);
		
		// Assert
		$this->assertEquals("filename", $galleryItem->getName());
		$this->assertFalse($galleryItem->isHidden());
		$this->assertEquals(0, $galleryItem->getPosition());
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
		$this->assertEquals(0, $galleryItem->getPosition());
		$this->assertEquals(".filename", $galleryItem->getFileName());
	}
	
	public function testConstructorPassingFilenameWithPosition() {
		// Given
		$filename = "[1]filename";
		
		// When
		$galleryItem = new GalleryItem($filename);
		
		// Then
		$this->assertEquals("filename", $galleryItem->getName());
		$this->assertFalse($galleryItem->isHidden());
		$this->assertEquals(1, $galleryItem->getPosition());
		$this->assertEquals("[1]filename", $galleryItem->getFileName());
	}
	
	public function testConstructorPassingFilenameWithBigNumberForPosition() {
		// Given
		$filename = "[9876]filename";
		
		// When
		$galleryItem = new GalleryItem($filename);
		
		// Then
		$this->assertEquals("filename", $galleryItem->getName());
		$this->assertFalse($galleryItem->isHidden());
		$this->assertEquals(9876, $galleryItem->getPosition());
		$this->assertEquals("[9876]filename", $galleryItem->getFileName());
	}
	
	public function testConstructorPassingHiddenFilenameWithPosition() {
		// Given
		$filename = ".[1]filename";
		
		// When
		$galleryItem = new GalleryItem($filename);
		
		// Then
		$this->assertEquals("filename", $galleryItem->getName());
		$this->assertTrue($galleryItem->isHidden());
		$this->assertEquals(1, $galleryItem->getPosition());
		$this->assertEquals(".[1]filename", $galleryItem->getFileName());
	}
	
	public function testIncreaseWhenPositionNotSet() {
		// Given
		$filename = "filename";
		$galleryItem = new GalleryItem($filename);
		
		// When
		$galleryItem->increasePosition();
		
		// Then
		$this->assertEquals(1, $galleryItem->getPosition());
		$this->assertEquals("[1]filename", $galleryItem->getFileName());
	}
	
	public function testIncreaseWhenPositionIsSet() {
		// Given
		$filename = "[3]filename";
		$galleryItem = new GalleryItem($filename);
		
		// When
		$galleryItem->increasePosition();
		
		// Then
		$this->assertEquals(4, $galleryItem->getPosition());
		$this->assertEquals("[4]filename", $galleryItem->getFileName());
	}
	
	public function testDecreaseWhenPositionIsGreaterThanZero() {
		// Given
		$filename = "[3]filename";
		$galleryItem = new GalleryItem($filename);
		
		// When
		$galleryItem->decreasePosition();
		
		// Then
		$this->assertEquals(2, $galleryItem->getPosition());
		$this->assertEquals("[2]filename", $galleryItem->getFileName());
	}
	
	public function testDecreaseWhenPositionIsZeroShouldNotWork() {
		// Given
		$filename = "[0]filename";
		$galleryItem = new GalleryItem($filename);
		
		// When
		$galleryItem->decreasePosition();
		
		// Then
		$this->assertEquals(0, $galleryItem->getPosition());
		$this->assertEquals("[0]filename", $galleryItem->getFileName());
	}
}
?>