<?php
require_once("test/bootstrap.php");
require_once("test/utils/FileSystemMockAdaptor.php");

class GalleryManagerTest extends PHPUnit_Framework_TestCase {

	private $fileSystemMockAdaptor;
	
	protected function setUp() {
		$this->fileSystemMockAdaptor = new FileSystemMockAdaptor($this);
	}
	
	public function testGetGalleryCategoriesWithoutHidden() {
		// Given
		$this->fileSystemMockAdaptor->stateThatFilesExist(array('gallery'));
		$this->fileSystemMockAdaptor->stateThatDirContains('gallery', array('[1]London', '[2]Rome', '[3]Madrid'));
		$this->fileSystemMockAdaptor->stateThatDirIsClosed('gallery');
		
		// When
		$categoryList = Context::getInstance()->galleryManager->getGalleryCategories();
		
		// Assert
		$this->assertEquals(count($categoryList), 3);
		$this->assertEquals("London", $categoryList[0]->getName());
		$this->assertEquals("Rome", $categoryList[1]->getName());
		$this->assertEquals("Madrid", $categoryList[2]->getName());
	}
	
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
		$newGalleryList = Context::getInstance()->galleryManager->orderByPosition($galleryList);
		
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
		$newGalleryList = Context::getInstance()->galleryManager->filterOutHidden($galleryList);
		
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
		$galleryItem = Context::getInstance()->galleryManager->getGalleryItemByFilename($galleryList, '[2]secondItem');
		
		// Assert
		$this->assertEquals("secondItem", $galleryItem->getName());
		$this->assertFalse($galleryItem->isHidden());
		$this->assertEquals(2, $galleryItem->getPosition());
		$this->assertEquals("[2]secondItem", $galleryItem->getFileName());
	}
	
	public function testGetGalleryItemByPosition() {
		// Given
		$galleryList = array(
				new GalleryItem('.[1]firstItem'),
				new GalleryItem('[2]secondItem'),
				new GalleryItem('[3]thirdItem')
		);
		
		// when
		$galleryItem = Context::getInstance()->galleryManager->getGalleryItemByPosition($galleryList, 2);
		
		// Assert
		$this->assertEquals("secondItem", $galleryItem->getName());
		$this->assertFalse($galleryItem->isHidden());
		$this->assertEquals(2, $galleryItem->getPosition());
		$this->assertEquals("[2]secondItem", $galleryItem->getFileName());
	}
}
?>