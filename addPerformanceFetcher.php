<?php

include("adminFunctions.php");
$data=json_decode(file_get_contents('php://input'),true);

$admin->addPerformance($data["username"],$data["tarih"],$data["performans"],$data["type"]);
// $admin->addPerformance("nevzat","2022-03-01","60");
?>