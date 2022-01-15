<?php

include("adminFunctions.php");
$data=json_decode(file_get_contents('php://input'),true);
$admin->showPerformance($data["username"],$data["type"]);
// $admin->showPerformance("veli2");
?>

