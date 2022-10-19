<?php
$id = $_GET["id"];
$rps = $_GET["rps"];
$file_json = "json/" . $id . ".json";

$file = fopen($file_json, "w+");
fwrite($file, $rps);
fclose($file);
?>