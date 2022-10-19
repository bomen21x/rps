<?php
error_reporting(0);
header("Expires: Mon, 26 Jul 1990 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Content-Type: application/json; charset=UTF-8");

$ck = $_GET["ck"];
$file_json = "json/" . $ck . ".json";

$rps["ck"] = (file_exists($file_json))? "ok":"no";
$mYrps = json_encode($rps);

echo $mYrps;
?>