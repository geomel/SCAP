<?php
session_start();

$json_solmetrics = file_get_contents('http://localhost/full/rest/contracts.php?adr=0'); //gets project metrics	
$json_decoded = json_decode($json_solmetrics);

?>