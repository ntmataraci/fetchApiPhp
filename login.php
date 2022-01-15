<?php

include("connection.php");

class login{
    private $db;

    function __construct($db)
    {
        $this->db=$db;
    }

function login($username,$password){
    $data=$this->db->prepare("select * from users where username='$username' and password='$password'");
    $data->execute();
    if($data->rowCount()>0):
    while($row=$data->fetch(PDO::FETCH_ASSOC)){
        session_start();
        $_SESSION["username"]=$row["username"];
        if ($row["auth"]=="admin"):
            $_SESSION["auth"]="admin";
            header("Location:adminPage.php");
            elseif($row["auth"]="user"):
            header("Location:userPage.php");
            endif; 
    }
    else:
    echo "hatalı giriş";
    endif;
}
}


$login=new login($dbh);

if (isset($_GET["type"])):
    $type=$_GET["type"];
    $username=$_POST["username"];
    $password=$_POST["password"];

switch ($type):
    case "login":
        $login->login($username,$password);
        break;
    endswitch;
 endif;


?>