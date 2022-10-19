<?php
error_reporting(0);
header("Expires: Mon, 26 Jul 1990 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Content-Type: application/json; charset=UTF-8");

$pla = $_GET["pla"];
$plb = $_GET["plb"];
$file_json_a = "json/" . $pla . ".json";
$file_json_b = "json/" . $plb . ".json";
$rps = array();

$rps["pla"] = (file_exists($file_json_a))? file_get_contents($file_json_a):null;
$rps["plb"] = (file_exists($file_json_b))? file_get_contents($file_json_b):null;

$a = array("r","p","s");
if(strtolower($pla) == "ai") {
    $b = array_rand($a);
    $rps["pla"] = $a[$b];
}

if(strtolower($plb) == "ai") {
    $b = array_rand($a);
    $rps["plb"] = $a[$b];
}

$mYrps = json_encode($rps);

echo $mYrps;

?>