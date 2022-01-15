<?php
$user="root";
$pass="";
$dbname="gamification";
try {
    $dbh = new PDO('mysql:host=localhost;dbname='.$dbname.';charset=utf8', $user, $pass);
    
} catch (PDOException $e) {
    print "Hata!: " . $e->getMessage() . "<br/>";
    die();
}

?>