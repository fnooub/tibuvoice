<?php
	$id = $_GET['id'];
	header("Content-type: text/plain");
	header("Content-Disposition: attachment; filename=$id.txt");
	echo file_get_contents("download/$id.txt");
?>