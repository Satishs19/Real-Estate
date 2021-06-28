<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
$servername="localhost";
$username="root";
$password="";
$db="realestate";
$conn=new mysqli($servername,$username,$password);
mysqli_select_db($conn,$db);
$stat = $_POST['buy'];
$sql= "UPDATE houseinfo SET status='sold' WHERE img_name='$stat'";
$upd= mysqli_query($conn,$sql);
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Success</title>
    <link rel="stylesheet" href="../css/style.css">
   <link rel="stylesheet" href="https:/cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="../js/script.js"></script>
  </head>
  <body>
    <div class="bg-img">
      <div class="content">
        <a href="home.html" class="closebtn">&times;</a>
        <header style="color:green">Purchase request has sent Successfully</header>
        <div class="signup">
          </br>
          <a href="home.html">Go to Home</a>
        </div>
      </div>
    </div>
  </body>
</html>
