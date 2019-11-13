<?php

include 'functions.php';
if (isset($_POST['truyen'])) {
	$mang = array(
		'truyen' => get_title($_POST['truyen']),
		'tacgia' => get_title($_POST['tacgia'])
	);
	file_put_contents('info_get.txt', json_encode($mang));
}

?>
<form method="post">
	<input type="text" name="truyen" placeholder="truyen">
	<input type="text" name="tacgia" placeholder="tacgia">
	<input type="submit" name="submit" value="SET">
</form>