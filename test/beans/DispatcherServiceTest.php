<?php
require_once("test/bootstrap.php");
require_once("test/utils/FileSystemMockAdaptor.php");

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
		// Given
		$_REQUEST['action'] = 'test';
		$_SERVER['REQUEST_METHOD'] = "GET";
		
		// TestAction defined at the end of the file
		
		$this->fileSystemMockAdaptor->stateThatFileExists('actions/TestAction.php');
		$this->fileSystemMockAdaptor->stateThatFileExists('pages/home.php');
		$this->fileSystemMockAdaptor->build();
		
		// when
		$this->dispatcherService->dispatch();
		
		// Assert
		$this->assertEquals('home', $_REQUEST['PAGE']);
		$this->assertEquals('pages/home.php', $_REQUEST['PAGE_FILE']);
		$this->assertEquals('TestAction.doGet()', $_REQUEST['MESSAGE']);
	}
	
	public function testDispatchExecutesDoPostOnAnActionIfDefined() {
		// Given
		$_REQUEST['action'] = 'test';
		$_SERVER['REQUEST_METHOD'] = "POST";
		
		// TestAction defined at the end of the file
		
		$this->fileSystemMockAdaptor->stateThatFileExists('actions/TestAction.php');
		$this->fileSystemMockAdaptor->stateThatFileExists('pages/post.php');
		$this->fileSystemMockAdaptor->build();
		
		// when
		$this->dispatcherService->dispatch();
		
		// Assert
		$this->assertEquals('post', $_REQUEST['PAGE']);
		$this->assertEquals('pages/post.php', $_REQUEST['PAGE_FILE']);
		$this->assertEquals('TestAction.doPost()', $_REQUEST['MESSAGE']);
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

class TestAction {
	function doGet() {
		$_REQUEST['MESSAGE'] = 'TestAction.doGet()';
	}
	
	function doPost() {
		$_REQUEST['MESSAGE'] = 'TestAction.doPost()';
		$_REQUEST['PAGE'] = 'post';
	}
}
?>