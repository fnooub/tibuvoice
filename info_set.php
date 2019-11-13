<?php

include 'db.php';

if (isset($_POST['submit'])) {
	if (!empty($_POST['content'])) {
		$mang = explode("@", trim($_POST['content']));

		$query = "UPDATE note SET content = :content WHERE id = :id";
		$stmt = $db->prepare($query);
		$stmt->execute(array(
			':id' => 503,
			':content' => json_encode($mang)
		));
	}
}

$query = "SELECT * FROM note WHERE id = :id";
$stmt = $db->prepare($query);
$stmt->execute(array(':id' => 503));
$note = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<title>Sửa</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
	a { text-decoration: none; }
	input[type=submit],
	textarea {
		display: block;
		margin: 10px 0;
		width: 100%;
	}
	input[type=radio] {
		display: inline-block;
		padding-right: 10px;
	}
</style>
<form method="post">
	<textarea name="content" placeholder="tach @"><?php echo $note['content'] ?></textarea>
	<input type="submit" name="submit" value="Replace">
</form>
