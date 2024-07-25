<?php
$GLOBALS['inst'] = "https://iv.datura.network/api/v1";
function invidiousGet($url) {
	return json_decode(file_get_contents($GLOBALS['inst'] . $url), true);
}
?>