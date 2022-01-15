<?php


 ($_SESSION["auth"]!="admin") ? header("Location:../index.php"):"";



 
?>



<div class="row mt-2">
        <div class="col-md-12" style="background-color:#2a6592;height:100%;display:flex;justify-content:center;align-items: center;color:white;">

<form method="post" autocomplete="off">
          <div class="form-row">
  <div class="form-col">
    <label for="adress">Adı Soyadı</label>
    <input list="livesearch" class="form-control" id="adress" placeholder="Kullanıcı Adını Girin" name="username" onkeyup="liveSearch('userdevamsizlik')" value=""></input>
    <datalist id="livesearch">
  </div>
  <button  class="btn btn-primary" onclick="getData(event,'userdevamsizlik')">Getir</button>
          </div>
       
</form>
        </div>
        </div>


        <div class="row"  style="background-color:#2a6592;height:100%;display:flex;justify-content:center;align-items: center;color:white;">
        <div class="col-md-6" style="display:flex;justify-content:center;align-items: center;">
  
<div class="col-md-4">Ad:<div id="username"></div></div>
<div class="col-md-4">  Tarih:  <input type="date" class="form-control" id="myTarih" name="tarih" ></input></div>
<div class="col-md-2" style="display:none;">   <input type="number" class="form-control" id="myPerformans"  name="performans" ></input></div>
  <button  class="btn btn-primary" onclick="addData('userdevamsizlik')">Güncelle</button>
    
        </div>
        </div>





        <div class="row mt-2">
        <div class="col-md-12" style="background-color:#2a6592;height:100%;display:flex;justify-content:center;align-items: center;color:white;">
        <h4>Devamsızlık Girişi</h4>
</div>
      <div class="col-md-12">
      <div class="row">
    <div class='col-md-2'> Ad Soyad</div>
    <div class='col-md-2'>Tarih</div>

    </div>
    <div class="col-md-12" id="showPerformance">

    <div>
      </div>

</div>
</div>
