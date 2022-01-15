<?php
include("adminFunctions.php");

$data = json_decode(file_get_contents('php://input'), true);

$admin->searchUser($data["username"],$data["type"]);


?>