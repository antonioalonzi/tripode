<?php
class FileSystemMockAdaptor {

	private $classToTest;
	
	public function __construct($classToTest) {
		$this->classToTest = $classToTest;
		
		Context::getInstance()->fileSystemService = $this->classToTest->getMock('FileSystemService');
	}
	
	public function stateThatFileExists($filename) {
		Context::getInstance()->fileSystemService
				->expects($this->classToTest->once())
				->method('fileExists')
				->with($this->classToTest->equalTo($filename))
				->will($this->classToTest->returnValue(true));
	}
	
	public function stateThatFileDoesNotExist($filename) {
		Context::getInstance()->fileSystemService
				->expects($this->classToTest->once())
				->method('fileExists')
				->with($this->classToTest->equalTo($filename))
				->will($this->classToTest->returnValue(false));
	}

}
?>