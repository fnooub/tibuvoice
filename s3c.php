<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php

include 'functions.php';

$link = $_GET['link'];

if (isset($link)) {

	if (preg_match('/Danh sách các phần/', single_curl($link))) {
		preg_match_all('/<hr\/>/', single_curl($link), $tong);

		$urls[] = $link;
		for ($i=2; $i <= count($tong[0]); $i++) { 
			$urls[] = $link.$i.'/';
		}

		foreach ($urls as $url) {
			$bd = '<div style="background:#f7f7f7;border:1px solid #ddd;color:#333;margin-bottom:5px;line-height:150%;padding:5px;font-size:14px">';
			$kt = '</div>';

			$nd = html_entity_decode(get_dom(single_curl($url), $bd, $kt));

			$nd = strip_tags($nd, '<p><br>');

			$nd = preg_replace('/truyensex\.tv/i', 'truyện sex', $nd);
			$noidung[] = $nd;
		}

		echo implode("<hr>", $noidung);
	} else {
			$bd = '<div style="background:#f7f7f7;border:1px solid #ddd;color:#333;margin-bottom:5px;line-height:150%;padding:5px;font-size:14px">';
			$kt = '</div>';

			$nd = html_entity_decode(get_dom(single_curl($link), $bd, $kt));

			$nd = strip_tags($nd, '<p><br>');

			$nd = preg_replace('/truyensex\.tv/i', 'truyện sex', $nd);
			echo $nd;
	}
	exit;
}

?>
<form action="" method="get">
	<input type="text" name="link">
	<input type="submit" value="GET">
</form>