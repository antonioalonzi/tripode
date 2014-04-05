<?php
require_once("model/Context.php");
require_once("test/FileSystemMockAdaptor.php");

class DispatcherServiceTest extends PHPUnit_Framework_TestCase {

	private $dispatcherService;
	private $fileSystemMockAdaptor;
	
	protected function setUp() {
		$this->dispatcherService = new DispatcherService();
		
		$this->fileSystemMockAdaptor = new FileSystemMockAdaptor($this);
	}
	
	public function testDispatchReturnsHomePageIfNoPageDefined() {
		// Given
		unset($_REQUEST['page']);
		
		$this->fileSystemMockAdaptor->stateThatFileExists('pages/home.php');
		$this->fileSystemMockAdaptor->build();
		
		// when
		$this->dispatcherService->dispatch();
		
		// Assert
		$this->assertEquals('home', $_REQUEST['PAGE']);
		$this->assertEquals('pages/home.php', $_REQUEST['PAGE_FILE']);
		$this->assertFalse(isset($_REQUEST['ERROR']));
	}
	
	public function testDispatchReturnsHomePageIfInexistentPageDefinedWithAnError() {
		// Given
		$_REQUEST['page'] = 'inexistentPage';
		
		$this->fileSystemMockAdaptor->stateThatFileDoesNotExist('pages/inexistentPage.php');
		$this->fileSystemMockAdaptor->build();
		
		// when
		$this->dispatcherService->dispatch();
		
		// Assert
		$this->assertEquals('home', $_REQUEST['PAGE']);
		$this->assertEquals('pages/home.php', $_REQUEST['PAGE_FILE']);
		$this->assertEquals('Page inexistentPage does not exist.', $_REQUEST['ERROR']);
	}
	
	public function testDispatchExecutesDoGetOnAnActionIfDefined() {
		
	}
	
	public function testDispatchExecutesDoPostOnAnActionIfDefined() {
		
	}
	
	public function testDispatchShowsTheHomePageWithAnErrorIfActionNotValid() {
		// Given
		$_REQUEST['action'] = 'inexistent';
		
		$this->fileSystemMockAdaptor->stateThatFileDoesNotExist('actions/InexistentAction.php');
		$this->fileSystemMockAdaptor->stateThatFileExists('pages/home.php');
		$this->fileSystemMockAdaptor->build();
		
		// When
		$this->dispatcherService->dispatch();
		
		// Assert
		$this->assertEquals('home', $_REQUEST['PAGE']);
		$this->assertEquals('pages/home.php', $_REQUEST['PAGE_FILE']);
		$this->assertEquals('Action InexistentAction does not exist.', $_REQUEST['ERROR']);
	}
}
?>