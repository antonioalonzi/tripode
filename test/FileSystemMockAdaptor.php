<?php
class FileSystemMockAdaptor {

	private $classToTest;
	
	// map with the expectations for calls to fileExists method.
	private $mapFileExistsExpectations = array();
	
	public function __construct($classToTest) {
		$this->classToTest = $classToTest;
		
		Context::getInstance()->fileSystemService = $this->classToTest->getMock('FileSystemService');
	}
	
	public function stateThatFileExists($filename) {
		$this->mapFileExistsExpectations[] = array($filename, true);
	}
	
	public function stateThatFileDoesNotExist($filename) {
		$this->mapFileExistsExpectations[] = array($filename, false);
	}
	
	public function build() {
		Context::getInstance()->fileSystemService
				->expects($this->classToTest->any())
				->method('fileExists')
				->will($this->classToTest->returnValueMap($this->mapFileExistsExpectations));
	}

}
?>