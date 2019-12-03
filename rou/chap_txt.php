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

echo $tit[1];
echo "\n\n";
echo preg_replace('#(<br */?>\s*)+#i', "\n\n", strip_tags('<br>', $nd[1]));
echo "\n---o0o---\n\n";