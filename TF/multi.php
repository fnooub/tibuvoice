<?php

$data = json_decode(file_get_contents("../info_get.txt"));

echo "hoangnamvoice<br>➥<br>➥<br>➥<br>➥<br>➥<br>➥<br>➥<br>";
echo $data->truyen;
echo "<br>➥<br>Tác giả: ";
echo $data->tacgia;
echo "<br>➥<br>";
echo "Kênh youtube: Độc thân cẩu";
echo "<br>➥<br>➥<br>➥<br>";

echo file_get_contents("multi.html");
echo "<br>➥<br>➥<br>➥<br>➥<br>➥<br>➥";
