<?php

include 'functions.php';

$id_truyen = isset($_GET['id_truyen']) ? $_GET['id_truyen'] : 1;
$id_chuong = isset($_GET['id_chuong']) ? $_GET['id_chuong'] : 1;

$single_curl = single_curl('https://dichngay.com/translate?u=https://www.rourouwu.com/read/'.$id_truyen.'/'.$id_chuong.'/');

$single_curl = html_entity_decode($single_curl);
// tieude
preg_match('#<h1>(.*?)</h1>#is', $single_curl, $tit);
// noidung
preg_match('#<!--go-->(.*?)<!--over-->#is', $single_curl, $nd);

?>
<title><?php echo $tit[1] ?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style type="text/css">
a {text-decoration: none;}
</style>
<h1><?php echo $tit[1] ?></h1>
<div><?php echo $nd[1] ?></div>
<hr>
<div><a href="chap.php?id_truyen=<?php echo $id_truyen ?>&id_chuong=<?php echo $id_chuong+1 ?>">Chuong sau</a></div>