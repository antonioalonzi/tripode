<?php
require_once("test/bootstrap.php");

class GalleryServiceTest extends PHPUnit_Framework_TestCase {

	public function testOrderByPosition() {
		// Given
		$galleryList = array(
				new GalleryItem('[5]e'),
				new GalleryItem('[3]c'),
				new GalleryItem('[2]b'),
				new GalleryItem('[3]c'),
				new GalleryItem('a'),
				new GalleryItem('[8]g'),
				new GalleryItem('.[4]d'),
				new GalleryItem('[6]f')
		);
		
		// when
		$newGalleryList = Context::getInstance()->galleryService->orderByPosition($galleryList);
		
		// Assert
		$this->assertEquals(8, count($newGalleryList));
		$this->assertEquals("a", $newGalleryList[0]->getName());
		$this->assertEquals("b", $newGalleryList[1]->getName());
		$this->assertEquals("c", $newGalleryList[2]->getName());
		$this->assertEquals("c", $newGalleryList[3]->getName());
		$this->assertEquals("d", $newGalleryList[4]->getName());
		$this->assertEquals("e", $newGalleryList[5]->getName());
		$this->assertEquals("f", $newGalleryList[6]->getName());
	}
	
	public function testFilterOutHidden() {
		// Given
		$galleryList = array(
				new GalleryItem('.[1]firstItem'),
				new GalleryItem('[2]secondItem'),
				new GalleryItem('[3]thirdItem')
		);
		
		// when
		$newGalleryList = Context::getInstance()->galleryService->filterOutHidden($galleryList);
		
		// Assert
		$this->assertEquals(2, count($newGalleryList));
		$this->assertEquals("secondItem", $newGalleryList[0]->getName());
		$this->assertEquals("thirdItem", $newGalleryList[1]->getName());
	}
	
	public function testGetGalleryItemByFilename() {
		// Given
		$galleryList = array(
				new GalleryItem('.[1]firstItem'),
				new GalleryItem('[2]secondItem'),
				new GalleryItem('[3]thirdItem')
		);
		
		// when
		$galleryItem = Context::getInstance()->galleryService->getGalleryItemByFilename($galleryList, '[2]secondItem');
		
		// Assert
		$this->assertEquals("secondItem", $galleryItem->getName());
		$this->assertFalse($galleryItem->isHidden());
		$this->assertEquals(2, $galleryItem->getPosition());
		$this->assertEquals("[2]secondItem", $galleryItem->getFileName());
	}
}
?>