<?php

include 'functions.php';

$id_truyen = isset($_GET['id_truyen']) ? $_GET['id_truyen'] : 1;

$single_curl = single_curl('https://dichngay.com/translate?u=https://www.rourouwu.com/read/'.$id_truyen.'/');

$single_curl = html_entity_decode($single_curl);

// tieude
preg_match('#<h1>(.*?)</h1>#is', $single_curl, $tit);
// mota
preg_match('#<div id="aboutbook">(.*?)</div>#is', $single_curl, $mota);

$lists = single_curl('https://dichngay.com/translate?u=https://m.rourouwu.com/novel/list/'.$id_truyen.'/1.html');

$lists_decode = html_entity_decode($lists);

preg_match_all('#<li><a href="(.*?)" target="_parent">(.*?)</a></li>#is', $lists_decode, $ds);

for ($i=0; $i < count($ds[1]); $i++) { 
	$urls[] = preg_replace('/.*novel\/(.*?)\/(.*?)\.html.*/', 'chap.php?id_truyen=$1&id_chuong=$2', urldecode($ds[1][$i]));
}

if (isset($_GET['download'])) {
	for ($i=0; $i < count($urls); $i++) { 
		$urls2[] = 'http://'.$_SERVER['SERVER_NAME'].'/rou/'.str_replace('chap.php', 'chap_txt.php', $urls[$i]);
	}
	if (file_exists("download/$id_truyen.txt")) {
		unlink("download/$id_truyen.txt");
	}
	foreach ($urls2 as $url2) {
		$file = fopen("download/$id_truyen.txt", "a+");
		fwrite($file, single_curl($url2));
		fclose($file);
	}
	header('Location: download.php?id=' . $id_truyen);
	exit;
}

?>
<title><?php echo $tit[1] ?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style type="text/css">
a {text-decoration: none;}
</style>
<h1><?php echo $tit[1] ?></h1>
<p><?php echo $mota[1] ?></p>
<a href="read.php?id_truyen=<?php echo $id_truyen ?>&download">Download TXT</a>
<hr>
<?php
foreach ($ds[2] as $key => $value) {
	echo '<p><a href="'.$urls[$key].'">'.$value.'</a></p>';
}
?>