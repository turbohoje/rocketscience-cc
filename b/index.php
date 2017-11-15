<?php

if(!preg_match('/149.199.90/', $_SERVER[REMOTE_ADDR])){
	exit;
}

header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
$homepage = file_get_contents($_SERVER['QUERY_STRING']);
echo $homepage;

$fh = fopen("last.txt", "w");
fwrite($fh, $_SERVER[REMOTE_ADDR]);
fclose($fh);
?>
