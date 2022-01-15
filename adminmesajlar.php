<?php


 ($_SESSION["auth"]!="admin") ? header("Location:../index.php"):"";

?>

<div class="row mt-2">
        <div class="col-md-12" style="background-color:#2a6592;height:100%;display:flex;justify-content:center;align-items: center;color:white;">
        <div class="col-md-3">Ad:</div> 
        <div class="col-md-3">Tarih:</div> 
        <div class="col-md-3">Mesajlar:</div> 
</div>
</div>
<?php
include("adminFunctions.php");
?>
      