<?php
	
	$dir = dirname(__FILE__);
	
	$file_out = trim($_REQUEST['file'], " \" ");
	
	$file = $file_out;
	
	if(file_exists($file))
	{
		$out = strlen($file_out);
		
		if (isset($file_out)) 
		{
			header('Content-Length:$out');
			header('Content-type: application/x-sql');
			header('Content-Disposition: attachment; filename="' . $file .'"');
			readfile($file);
			unlink($file);
			exit;
		}
	}
	else
	{
		echo "ei löydy";
		var_dump($file);
	}
	
	

?>