<?php

include '../db.php';

$note = $db->query("SELECT * FROM note ORDER BY id = 503 DESC")->fetch(PDO::FETCH_ASSOC);

$data = json_decode($note['content']);

echo "hoangnamvoice<br>➥<br>➥<br>➥<br>➥<br>➥<br>➥<br>➥<br>";
echo $data[0];
echo "<br>➥<br>Tác giả: ";
echo $data[1];
echo "<br>➥<br>";
echo "Kênh youtube: Độc thân cẩu";
echo "<br>➥<br>➥<br>➥<br>";

echo file_get_contents("multi.html");
echo "<br>➥<br>➥<br>➥<br>➥<br>➥<br>➥";
