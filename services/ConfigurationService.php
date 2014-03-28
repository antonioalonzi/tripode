<?php
class ConfigurationService {

	private $configuration;

	public function __construct(){
		$this->configuration = new Configuration();
	}

	public function getConfiguration() {
		return $this->configuration;
	}

	function save() {
		file_put_contents("../data/configuration.txt", (serialize($this)));
	}

	function loadAdoptions()
	{
	/*    $filename = '../adoptions/adoptions.txt';
	    if (file_exists($filename)) 
	    {
	        $datain = file_get_contents($filename);
	        $out = explode("<!-- E -->", $datain);
	
	        echo "<br /><u>Retrieved Data</u><br />";
	        $count = count($out);
	        echo 'Count: '.$count;
	
	        for ($i = 0; i < $count; $i++)
	        {
	            $curAdoption = unserialize($out[i]);
	           if (curAdoption)
	                echo $curAdoption->Display();
	            else
	                echo 'Error Reading Record.';
	            echo '<br />';
	        }
	
	    }*/
	}
}
?>
