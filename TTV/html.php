<?php

include '../functions.php';

$s = $_GET['s'];
$e = $_GET['e']+1;

// lay tu 1 den 2
preg_match('#\['.$s.'\](.*?)\['.$e.'\]#is', file_get_contents('http://' . $_SERVER["SERVER_NAME"] . '/TTV/data.php?name='.$_GET['name']), $links);

// lay link tu 1 den 2
preg_match_all('#</a> <a href="(.*?)"#is', $links[1], $lists);

unlink("multi.html");
foreach ($lists[1] as $url) {
	$noidung = file_get_contents($url);
	$file = fopen("multi.html", "a+");
	fwrite($file, $noidung);
	fclose($file);
}

header('Location: multi.php');
exit;