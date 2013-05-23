<?php

	$file_out = $_REQUEST['file'];

	$out = strlen($file_out);
	if (isset($file_out)) {
		header("Content-Length: $out");
		header("Content-type: application/x-sql");
		header("Content-Disposition: attachment; filename=$file_out");
		readfile($file_out);
		exit;
	}

?>