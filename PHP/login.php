<?php header('Access-Control-Allow-Origin: *');
header('content-type: text/html; charset=utf-8');



$username = $_GET['Username'];
$password = $_GET['Password'];
$usertype = $_GET['UserType'];

//$con=mysqli_connect("localhost","root","","braingamesvocab");
$con = mysqli_connect("mysql13.000webhost.com","a4052879_admin","braingames2013","a4052879_bgv");
mysqli_query($con, "SET NAMES UTF8");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


$qz = "SELECT UserID FROM user WHERE Username='".$username."' AND Password='".$password."' AND UserType ='".$usertype."'" ;
//$qz = str_replace("\'","",$qz);

$result = mysqli_query($con,$qz);

while($row = mysqli_fetch_array($result))
  {
  echo $row['UserID'];
  }

  
mysqli_close($con);
?>

