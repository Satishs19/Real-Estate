<?php if($_SERVER['REQUEST_METHOD'] == "POST"){
$servername="localhost";
$username="root";
$password="";
$db="realestate";
$conn=new mysqli($servername,$username,$password);
mysqli_select_db($conn,$db);
$email = $_POST['mail'];
$password = $_POST['pass'];
  $sql= "SELECT * FROM userdetails WHERE email='$email' and password='$password'";
  $count = mysqli_num_rows($conn->query($sql));
  if ($count == 1){
  echo "<script type='text/javascript'>alert('Login Successful')</script>";
  header('Location: home.html');
  }else{
  header('Location:xlogin.html');
  }
}
?>
