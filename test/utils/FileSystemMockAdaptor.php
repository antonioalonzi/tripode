<?php
class FileSystemMockAdaptor {

	private $classToTest;
	
	// map with the expectations for calls to fileExists method.
	private $mapFileExistsExpectations = array();
	
	public function __construct($classToTest) {
		$this->classToTest = $classToTest;
		
		Context::getInstance()->fileSystemAdaptor = $this->classToTest->getMock('FileSystemAdaptor');
	}
	
	public function stateThatFileExists($filename) {
		$this->mapFileExistsExpectations[] = array($filename, true);
	}
	
	public function stateThatFileDoesNotExist($filename) {
		$this->mapFileExistsExpectations[] = array($filename, false);
	}
	
	public function stateThatDirContains($dir, $files) {
		$files[] = false;
		
		Context::getInstance()->fileSystemAdaptor
				->expects($this->classToTest->any())
				->method('openDir')
				->with($dir)
				->will($this->classToTest->returnValue('galleryHandle'));
		
		Context::getInstance()->fileSystemAdaptor
				->expects($this->classToTest->any())
				->method('readDir')
				->with('galleryHandle')
				->will(new PHPUnit_Framework_MockObject_Stub_ConsecutiveCalls($files));
	}
	
	public function build() {
		Context::getInstance()->fileSystemAdaptor
				->expects($this->classToTest->any())
				->method('fileExists')
				->will($this->classToTest->returnValueMap($this->mapFileExistsExpectations));
	}
}
?>