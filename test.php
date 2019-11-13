<?php

include 'db.php';

$note = $db->query("SELECT * FROM note ORDER BY id = 503 DESC")->fetch(PDO::FETCH_ASSOC);

echo json_decode($note['content'])[1];