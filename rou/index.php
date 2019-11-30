<?php

include 'functions.php';

$page = isset($_GET['page']) ? $_GET['page'] : 1;

$single_curl = single_curl('https://dichngay.com/translate?u=https://www.rourouwu.com/top/allvisit_'.$page.'/');

$single_curl = html_entity_decode($single_curl);

preg_match_all('#<span class=".*?"><a target="_parent" href=".*?" style="display:none">.*?</a><a target="_parent" href="(.*?)" title="(.*?)">.*?</a></span>#is', $single_curl, $lists);

for ($i=0; $i < count($lists[1]); $i++) { 
	$urls[] = preg_replace('/.*read\/(.*?)\/.*/', 'read.php?id_truyen=$1', urldecode($lists[1][$i]));
}

foreach ($lists[2] as $key => $value) {
	$list[] = '<a href="'.$urls[$key].'">'.$value.'</a>';
}

?>
<title>hello</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style type="text/css">
a {text-decoration: none;}
</style>
<?php echo implode('<hr>', $list) ?>
<hr>
<a href="index.php?page=<?php echo $page-1 ?>">Trang truoc</a> - <a href="index.php?page=<?php echo $page+1 ?>">Trang sau</a>
