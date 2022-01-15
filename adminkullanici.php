<?php


 ($_SESSION["auth"]!="admin") ? header("Location:../index.php"):"";
include_once("adminFunctions.php");
?>
<div class="row mt-2">
        <div class="col-md-12" style="background-color:#2a6592;height:100%;display:flex;justify-content:center;align-items: center;color:white;">

        <form method="post" action="adminFunctions.php?type=register">
          <div class="form-row">
  <div class="form-col">
    <label for="exampleInputEmail1">Adı Soyadı</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kullanıcı Adını Girin" name="username">
  </div>
  <div class="form-col">
    <label for="exampleInputPassword1">Şifre</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Şifre Belirleyin" name="password">
  </div>
  <div class="form-col">
    <label for="exampleInputEmail1">Bölüm</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Bölüm Giriniz" name="bolum">
  </div>
  <div class="form-col">
  <label for="exampleInputSubmit1">Onay</label>
  <input type="submit" class="form-control btn btn-primary" id="exampleInputSubmit1" value="Ekle"></input>
</div>
  </div>
</form>
        </div>
        <?php
if (isset($_GET["msg"])):
    echo "<div class='row mx-auto'>".$_GET["msg"]."</div>";
endif;
?>
        </div>

        <div class="row mt-2">
        <div class="col-md-12" style="background-color:#2a6592;height:100%;display:flex;justify-content:center;align-items: center;color:white;">
        <div class="container">
<div class="row">
                <div class="col-md-2">Kullanıcı</div> 
                <div class="col-md-2">Puan</div> 
                <div class="col-md-3">Bölüm</div> 
                <div class="col-md-3">Giriş Tarihi</div> 
                </div>
            
<?php
$admin->allUsers();
?>
    </div>
</div>
</div>
