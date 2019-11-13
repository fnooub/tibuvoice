<?php

include '../functions.php';

$s = $_GET['s'];
$e = $_GET['e']+1;

// lay tu 1 den 2
preg_match('#\['.$s.'\](.*?)\['.$e.'\]#is', file_get_contents('http://' . $_SERVER["SERVER_NAME"] . '/TF/data.php?name='.$_GET['name']), $links);

// lay link tu 1 den 2
preg_match_all('#</a> <a href="(.*?)"#is', $links[1], $lists);

$noidung = multi_curl($lists[1]);

$data = json_decode(file_get_contents("../info_get.txt"));

echo "hoangnamvoice<br>➥<br>➥<br>➥<br>➥<br>➥<br>➥<br>➥<br>";
echo $data->truyen;
echo "<br>➥<br>Tác giả: ";
echo $data->tacgia;
echo "<br>➥<br>";
echo "Kênh youtube: Độc thân cẩu";
echo "<br>➥<br>➥<br>➥<br>";

echo $noidung;
echo "<br>➥<br>➥<br>➥<br>➥<br>➥<br>➥";
