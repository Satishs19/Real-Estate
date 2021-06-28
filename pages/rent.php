<?php
$db = mysqli_connect("localhost","root","","realestate");  // database connection
if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}
{
$servername="localhost";
$username="root";
$password="";
$dbs="realestate";
$conn=new mysqli($servername,$username,$password);
mysqli_select_db($conn,$dbs);
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,height=device-height, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0">
  <title>Tejasco-Your Property Management</title>
  <link rel = "icon" href =  "F:\java book\tejsco.png"  type = "image/x-icon">
<link rel="stylesheet" href="../css/button.css">
<link rel="stylesheet" href="../css/menu.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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

 <div class="topnav" >
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
  <a class="topnava" href="../index.html"><span class="fa fa-lock "></span>&nbsp;Logout</a>
  <a class="topnava" href="home.html"><span class="fa fa-home "></span>&nbsp;Home</a>

</div>
<div>
<div style="background-image:url(../image/tejasco.png);height: 40px;width:120px;	display: block;  margin-left: auto;  margin-right: auto;background-repeat: no-repeat;background-size: cover;"></div>
 <span style="font-family: cursive;font-size: 22px;color: #4d4d00;display: block; margin-left: auto; margin-right: auto; text-align: center;">TEJASCO</span>
</div>
  <div class="bt">

<a href="home.html"  style="color:black;font-weight:bold;float:right;font-size:20px;">&times;</a>
       <h2 style="text-align: center;">Rent</h2>
   <div class="av">

     <?php
     $details = mysqli_query($conn,"select * from houseinfo where sellrent='Rent' AND status='unsold'");
      $count = mysqli_num_rows($details);
     require "sell.php";
     $records = mysqli_query($db,"select img_name from images");
     if ($count == 0){
     echo "<h3 align=center>No result found</h3>";
   }
   while($dat = mysqli_fetch_array($details))
   {
     echo "<hr>";
     $data = mysqli_fetch_array($records);
     $ad = mysqli_fetch_array(mysqli_query($conn,"select * from address where email='$dat[email]'"));
     $DBIMG->show($dat['img_name']);
     $val=$dat['img_name'];
  echo "<br><b>Pricing(INR):</b> $dat[price] <br><b>Description:</b> $dat[hd] <br><b>Location:</b> $ad[address] <br> $ad[city]  $ad[pin] <br><b>Owner:</b> $dat[name]  <b>Phone:</b> $dat[phone] <br><b>Email:</b> $dat[email]<br>";
  echo "<form method='post' action='bsuc.php'><button type='submit' name='buy' value='{$val}'>Buy</button></form>";
echo "<br>";
   }
     ?>
     <hr>
   </div>
</div>
</body>
</html>
