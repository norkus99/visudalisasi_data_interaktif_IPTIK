<?php

	ini_set('display_errors', 'On');
	error_reporting(E_ALL);

	$data = $_POST['imagedata'];
	$target = 'img_'.date('Y-m-d-H-s').'.jpg';

	$whandle = fopen($target,'w');
	stream_filter_append($whandle, 'convert.base64-decode',STREAM_FILTER_WRITE);

	fwrite($whandle,$data);
	fclose($whandle);
	header("Content-Length: " . filesize($target));
	header("Content-Disposition: attachment; filename=" . basename($target));
	readfile($target);
	unlink($target);

?>