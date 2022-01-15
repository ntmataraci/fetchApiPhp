<?php
include("connection.php");

class admin{
    private $db;
    function __construct($db)
    {
        $this->db=$db;
    }

function register($username,$password,$bolum){
$data=$this->db->prepare("select * from users where username='$username'");
$data->execute();
if ($data->rowCount()>0){
    $msg= "lütfen başka isim yazınız, mevcutta var.";
  header("Location:adminPage.php?page=kullanici&msg=$msg");
}else{
$userHelper="user";
    $data=$this->db->prepare("INSERT INTO users (username,password,bolum,auth,date) VALUES (?,?,?,?,?)");
    $data->bindParam(1,$username,PDO::PARAM_STR);
    $data->bindParam(2,$password,PDO::PARAM_STR);
    $data->bindParam(3,$bolum,PDO::PARAM_STR);
    $data->bindParam(4,$userHelper,PDO::PARAM_STR);
    $data->bindParam(5,date("Y-m-d"),PDO::PARAM_STR);
    $data->execute();
    header("Location:adminPage.php?page=kullanici");
}
}
function allUsers(){
$data=$this->db->prepare("select * from users");
$data->execute();

while($result=$data->fetch(PDO::FETCH_ASSOC)){
$username= $result["username"];
$puan=$result["puan"];
$bolum=$result["bolum"];
$tarih=$result["date"];
$id=$result["id"];
    echo "
  <div class='row'>
  <div class='col-md-2'><a href='#' id='helper-$id' onClick='updateScreen($id)'>$username</a></div>
  <div class='col-md-2'>$puan</div>
  <div class='col-md-3'>$bolum</div>
  <div class='col-md-3'>$tarih</div>
 
  </div>

  <div class='row helper-form classHelper-$id'>
  <form style='display:flex;' method='POST' action='?page=kullanici&type=update&id=$id'>
  <div class='col-md-2'><input type='text' value='$username' name='username'></input></div>
  <div class='col-md-2'><input type='text' value='$puan' name='puan'></input></div>
  <div class='col-md-3'><input type='text' value='$bolum' name='bolum'></input></div>
  <div class='col-md-3'><input type='text' value='$tarih' name='tarih'></input></div>
  <div class='col-md-2'><input type='submit' value='Güncelle'></input></div>
  </form>
  </div>
    ";
    
}
}

function detailUsers($id){
    $data=$this->db->prepare("select * from users where id=$id");
    $data->execute();
    
    while($result=$data->fetch(PDO::FETCH_ASSOC)){
    $username= $result["username"];
    $puan=$result["puan"];
    $bolum=$result["bolum"];
    $tarih=$result["date"];

    echo "
    <input type='text' value=$username></input>
    <input type='text' value=$puan></input>
    <input type='text' value=$bolum></input>
    <input type='text' value=$tarih></input>
    <input type='submit' value='Güncelle'></input>
    ";

    }
}

function addPerformance($username,$tarih,$performans,$type){
    echo $type;
if ($type=="userperformans"){
$data=$this->db->prepare("INSERT into userperformans (username,tarih,performans) VALUES (?,?,?)");
$data->bindParam(1,$username,PDO::PARAM_STR);
$data->bindParam(2,$tarih,PDO::PARAM_STR);
$data->bindParam(3,$performans,PDO::PARAM_STR);
$data->execute();
}elseif ($type=="userdevamsizlik")
    {
        $data=$this->db->prepare("INSERT into userdevamsizlik (username,tarih) VALUES (?,?)");          
$data->bindParam(1,$username,PDO::PARAM_STR);
$data->bindParam(2,$tarih,PDO::PARAM_STR);
$data->execute();
    }

}




function updateUser($username,$tarih,$puan,$bolum,$id){
    $data=$this->db->prepare("UPDATE users SET username=?,DATE=?,bolum=$bolum,puan=$puan  where id=$id ");
    $data->bindParam(1,$username,PDO::PARAM_STR);
    $data->bindParam(2,$tarih,PDO::PARAM_STR);
    $data->execute();
}




function searchUser($username,$type){
 
    $data=$this->db->prepare("SELECT * from users where username LIKE '%$username%'");
    $data->execute();
    while($result=$data->fetch(PDO::FETCH_ASSOC)){
        $helperResult=$result["username"];
    echo '<option value="'.$helperResult.'">';
    }
    }

function showPerformance($username,$type){
    $data=$this->db->prepare("SELECT * from $type where username=?");
    $data->bindParam(1,$username,PDO::PARAM_STR);
    $data->execute();
// $list=[];

 while($result=$data->fetch(PDO::FETCH_ASSOC)){
     switch ($type):
     case "userperformans":
     $helperValue=  "<div class='col-md-2 col-4'>{$result["performans"]}</div>";
     break;
     case "userdevamsizlik":
     $helperValue="";
     break;
     endswitch;

     // fetcher jsonişleri sonra vazgeçtim
    //  echo $result["username"].$result["tarih"].$result["performans"];
    // array_push($list,$result["username"],$result["performans"],$result["tarih"]);
    echo <<<EOT
    <div class='row'>
     <div class='col-md-2 col-4'>{$result["username"]}</div>
     <div class='col-md-2 col-4'>{$result["tarih"]}</div>
        $helperValue
         </div>
    EOT;
// $list["username"]=$result["username"];
// $list["performans"][$result["tarih"]]=$result["performans"];
//  }
// $list=json_encode($list);
//     echo $list;
}
}


function getMessages(){
    $data=$this->db->prepare("select * from mesajlar");
    $data->execute();
    while($result=$data->fetch(PDO::FETCH_ASSOC)){
echo <<<EOT

<div class="row mt-2">
        <div class="col-md-12" style="background-color:#2a6542;height:100%;display:flex;justify-content:center;align-items: center;color:white;">
        <div class="col-md-3">{$result["username"]}</div> 
        <div class="col-md-3">{$result["tarih"]}</div> 
        <div class="col-md-3">{$result["mesaj"]}</div> 
</div>
</div>
EOT;
    }
}


}
$admin=new admin($dbh);



@$type=$_GET["type"];
@$id=$_GET["id"];
@$username=$_POST["username"];
@$password=$_POST["password"];
@$bolum=$_POST["bolum"];
@$tarih=$_POST["tarih"];
@$puan=$_POST["puan"];
@$page=$_GET["page"];
switch ($type):
  case "register";
  $admin->register($username,$password,$bolum);
  break;
  case "update";
  $admin->updateUser($username,$tarih,$puan,$bolum,$id);
  break;
endswitch;

if ($page=="mesajlar"){
  $admin->getMessages();
}

// if (isset($id)){
//     $admin->detailUsers($id);
// }


?>