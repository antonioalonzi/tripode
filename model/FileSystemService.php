<?php

/**
 * This class is used to wrap all interaction with the filesystem.
 * In this way it is easy to mock any action with the filesystem for testing.
 */
class FileSystemService {

	public function fileExists($filename) {
		return file_exists($filename);
	}
	
	public function requireOnce($fileActionName) {
		require_once($fileActionName);
	}

}
?>