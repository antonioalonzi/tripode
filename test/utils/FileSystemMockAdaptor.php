<?php
class FileSystemMockAdaptor {

	private $classToTest;
	
	public function __construct($classToTest) {
		$this->classToTest = $classToTest;
		
		Context::getInstance()->fileSystemAdaptor = $this->classToTest->getMock('FileSystemAdaptor');
	}
	
	public function stateThatFilesExist($filenames) {
		$mapFileExistsExpectations = array();
		foreach ($filenames as $filename) {
			$mapFileExistsExpectations[] = array($filename, true);
		}
		
		Context::getInstance()->fileSystemAdaptor
				->expects($this->classToTest->any())
				->method('fileExists')
				->will($this->classToTest->returnValueMap($mapFileExistsExpectations));
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

}
?>