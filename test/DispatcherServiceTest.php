<?php
require_once("model/Context.php");
require_once("test/FileSystemMockAdaptor.php");

class DispatcherServiceTest extends PHPUnit_Framework_TestCase {

	private $dispatcherService;
	private $fileSystemMockAdaptor;
	
	protected function setUp() {
		$this->dispatcherService = new DispatcherService();
		
		// create a mock for the filesystem
		$this->fileSystemMockAdaptor = new FileSystemMockAdaptor($this);
	}
	
	public function testDispatchReturnHomePageIfNoPageDefined() {
		// Given
		unset($_REQUEST['page']);
		
		$this->fileSystemMockAdaptor->stateThatFileExists('pages/home.php');
		
		// when
		$this->dispatcherService->dispatch();
		
		// Assert
		$this->assertEquals('home', $_REQUEST['PAGE']);
		$this->assertEquals('pages/home.php', $_REQUEST['PAGE_FILE']);
		$this->assertFalse(isset($_REQUEST['ERROR']));
	}
	
	public function testDispatchReturnHomePageIfInexistentPageDefinedWithAnError() {
		// Given
		$_REQUEST['page'] = 'inexistentPage';
		
		// homepage exists
		$this->fileSystemMockAdaptor->stateThatFileDoesNotExist('pages/inexistentPage.php');
		
		// when
		$this->dispatcherService->dispatch();
		
		// Assert
		$this->assertEquals('home', $_REQUEST['PAGE']);
		$this->assertEquals('pages/home.php', $_REQUEST['PAGE_FILE']);
		$this->assertEquals('Page inexistentPage does not exist.', $_REQUEST['ERROR']);
	}
}
?>