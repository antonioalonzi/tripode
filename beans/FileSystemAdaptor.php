<?php

/**
 * This class is used to wrap all interaction with the filesystem.
 * In this way it is easy to mock any action with the filesystem for testing.
 */
class FileSystemAdaptor {

	public function fileExists($filename) {
		return file_exists($filename);
	}
	
	public function requireOnce($filename) {
		require_once($filename);
	}
	
	public function openDir($path) {
		return opendir($path);
	}
	
	public function readDir($handle) {
		return readdir($handle);
	}
	
	public function closeDir($handle) {
		return closedir($handle);
	}

}
?>