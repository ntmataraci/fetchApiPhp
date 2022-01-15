<?php
include("login.php");
session_start();
if (!isset($_SESSION["username"])){
    header("Location:index.php");
}


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Metem Otomotiv</title>
  </head>
  <body>
 <div class="container" style="background-color:#c4d4e0;border-radius:3rem;">
     <div class="row mt-5">
<div class="col-md-3 col-12"><img style="border:1px solid black;margin-top:0.5rem;"  src="images/211126.png" height="100" class="rounded mx-auto d-block"></div>
<div class="col-md-3 col-12">
    <h5>Bilgilerim</h5>
<ul class="list-unstyled">
<li >Ad-Soyad:<?php echo $_SESSION["username"] ?></li>
<li >Giriş Tarihi: 01.01.2000</li>
<li >Seviye:     8</li>
<li >Puan:  5000</li>
</ul>
</div>

<div class="col-md-2 col-6">
<h5>Kayıtlarım</h5>
<ul class="list-unstyled">
<li ><a href="#" >Performans</a></li>
<li ><a href="#">Devamsızlık</a></li>
<li ><a href="#">Kalite</a></li>
</ul>
</div>

<div class="col-md-4 col-6">
<h5>Başarılarım</h5>
<ul class="list-unstyled">
    <li>Arka arkaya 3 ay devamsızlık</li>
     </div>
     </div>



     <div class="row mx-auto">
     <div class="col-md-8 col-6">
         <p style="border-bottom:1px solid black";>Görevler</p>
<ul class="list-unstyled">
    <li>Arka arkaya 3 ay devamsızlık</li>
    <li>Başarılı Kaizen Örneği</li>
    <li>Yüksek Performans</li>
     </div>

     <div class="col-md-4 col-6">
         <p style="border-bottom:1px solid black";>Çantam</p>
         <div style="display:flex;justify-content:center;flex-wrap:wrap;gap:1rem;">
<ul class="list-unstyled">
    <li>Güneş Gözlüğü</li>
    <li>Hasır Şapka</li>
    <li>Sinema Bileti</li>
</ul>
<ul class="list-unstyled">
    <li>x2</li>
    <li>x1</li>
    <li>x1</li>
</ul>
</div>
     </div>
     </div>

     <div class="row mx-auto" style="border-top:1px solid black;">
     <h3 class="mx-auto">Mesaj At </h3>
         <form  class="form-group" style="display:flex;justify-content:center;">
         <textarea  class="form-control"  rows="3" cols="160" name="mesaj" placeholder="Şikayet/Öneri/Tavsiyeleriniz için lütfen burayı doldurup göndere basınız."></textarea>
  <input  type="submit" class="btn btn-primary"></input>
         </form>
</div>

<div class="row mx-auto" style="border-top:1px solid black;">
     <h3 class="w-100" style="text-align:center;">Geçmiş Mesajlarınız </h3>
<table>
    <thead>
        <tr>
        <th>Tarih</th>
        <th>Mesajınız</th>
        <th>Cevap</th>
</tr>
    </thead>
    <tbody><tr>
    <td>01.02.2021</td>
        <td>Tatlı az geliyor.</td>
        <td>Tatlı sağlığa zararlı olduğu için sebze ağırlıklı yemek çıkarmaktayız.</td>
</tr>
    </tbody>
</table>
</div>


 </div>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>