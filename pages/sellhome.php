<?php
if (isset($_FILES['upload'])) {
  require "sell.php";
  echo $DBIMG->save() ? "<div></div>" : "<div>{$DBIMG->error}</div>";
}
if($_SERVER['REQUEST_METHOD'] == "POST"){
$servername="localhost";
$username="root";
$password="";
$db="realestate";
$conn=new mysqli($servername,$username,$password);
mysqli_select_db($conn,$db);
$imgname=$_FILES["upload"]["name"];
  $sql="INSERT INTO houseinfo(name,phone,email,hd,sellrent,price,img_name) values ('$_POST[name]','$_POST[pno]','$_POST[mail]','$_POST[details]','$_POST[selltype]','$_POST[price]','$imgname')";
$conn->query($sql);
 $sql2="INSERT INTO address(email,address,city,pin) values ('$_POST[mail]','$_POST[address]','$_POST[city]','$_POST[pincode]')";
 $conn->query($sql2);
  header('Location: sellsuccess.html');
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,height=device-height, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0">
  <title>Tejasco-Your Property Management</title>
  <link rel = "icon" href =  "F:\java book\tejsco.png"  type = "image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/button.css">
<link rel="stylesheet" href="../css/menu.css">
<link rel="stylesheet" href="../css/style.css">
<script>
function openNav()
{
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav()
{
  document.getElementById("mySidenav").style.width = "0";
}
</script>
</head>
<body  style="background-image: url(../image/a.jpg);" class="insert">

 <div class="topnav" style="height:50px;margin-top: 8px;margin-left: 8px;margin-right: 8px;">
 <span style="font-size:30px;color:black;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
 <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a class="sidenava" href="menu 1.html">Real Estate Advisory</a>
  <a class="sidenava" href="menu 2.html">Valuation and risk assessment</a>
  <a class="sidenava" href="menu 3.html">Buy/Sell/Rent</a>
  <a class="sidenava"  href="menu 4.html">Tenancy management</a>
  <a class="sidenava" href="menu 5.html">Financial assistance from banks</a>
  <a class="sidenava" href="menu 6.html">Legal Assistance</a>
  <a class="sidenava" href="menu 7.html">Tax Advisory</a>
  <a class="sidenava" href="menu 8.html">Contact Us</a>
 </div>

 <a class="topnava" href="aboutus.html"><span class="fa fa-users"></span>&nbsp;About Us</a>
  <a class="topnava" href="../index.html"><span class="fa fa-lock "></span>&nbsp;logout</a>
  <a class="topnava" href="home.html"><span class="fa fa-home "></span>&nbsp;Home</a>

</div>
<div>
  <div style="background-image:url(../image/tejasco.png);height: 40px;width:120px;	display: block;  margin-left: auto;  margin-right: auto;background-repeat: no-repeat;background-size: cover;"></div>
 <span style="font-family: cursive;font-size: 22px;color: #4d4d00;display: block; margin-left: auto; margin-right: auto; text-align: center;">TEJASCO</span>
</div>

  <div class="bt">
    <a href="home.html"  style="color:black;font-weight:bold;float:right;font-size:20px;">&times;</a>
     <h1 style="text-align: center;">Sell a Home</h1>

   <div class="av" style="height: 400px;">
     <form  method="post" enctype="multipart/form-data" >
       <div class="field">
         &nbsp;<span class="fa fa-user"></span>&nbsp;
         <input type="text" name="name" required placeholder=" Owner Name">
       </div>
       <div class="field">
         &nbsp;<span class="fa fa-phone"></span>&nbsp;
         <input type="tel" name="pno" pattern="^\d{10}$" required placeholder=" 10 Digit Phone no">
       </div>
       <div class="field">
         &nbsp;<span class="fa  fa-envelope"></span>&nbsp;
         <input type="email" name="mail" required placeholder=" E-mail">
       </div>
       <div class="field">
         &nbsp;&nbsp;<span class="fa fa-map-marker "></span>&nbsp;
         <input type="textarea" name="address" rows="8" cols="80" id="add" required placeholder=" Address">
       </div>
       <div class="field">
         &nbsp;<span class="fa fa-building"></span>&nbsp;
         <input type="text" name="city" required placeholder=" City">
       </div>
       <div class="field">
         &nbsp;<span class="fa fa-map-pin"></span>&nbsp;
         <input type="text" name="pincode" required placeholder=" Pin-code">
       </div>

       <div class="field">
         &nbsp;<span class="fa fa-home"></span>&nbsp;
         <input type="textarea" name="details" rows="8" cols="80" id="det" required placeholder=" House Details">
       </div><br>

       <div>
         &nbsp;<span class="fa fa-toggle-on"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <input type="radio" id="sell" name="selltype" value="Sell" >
         <label for="sell">Sell</label>
         <input type="radio"  id="rent" name="selltype" value="Rent" >
         <label for="sell">Rent</label>
       </div><br>

       <div class="field">
        &nbsp; <span class="fa fa-inr"></span>&nbsp;
         <input type="number" name="price" required placeholder="Pricing">
       </div><br>

       <div>
         &nbsp;<span class="fa fa-file-picture-o"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input id="img"  name="upload" type="file" required accept=".png,.gif,.jpg,.webp"/>
      </div><br>

       <div class="field">
         <input type="submit" name="submit" value="Submit">
       </div>
     </form>
   </div>

</div>
</body>
</html>
