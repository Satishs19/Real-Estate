<?php if($_SERVER['REQUEST_METHOD'] == "POST"){
$servername="localhost";
$username="root";
$password="";
$db="realestate";
$conn=new mysqli($servername,$username,$password);
mysqli_select_db($conn,$db);
  $sql="INSERT INTO userdetails(uname,dob,phone,email,password) values ('$_POST[uname]','$_POST[dob]','$_POST[pno]','$_POST[mail]','$_POST[pass]')";
  $conn->query($sql);
}
header('Location: success.html');
exit;
?>
