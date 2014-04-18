<?php header('Access-Control-Allow-Origin: *');

header('content-type: text/html; charset=utf-8');


$dblink = mysqli_connect("mysql13.000webhost.com","a4052879_admin","braingames2013","a4052879_bgv");
//$dblink = mysqli_connect("localhost","root","","braingamesvocab");

mysqli_query($dblink, "SET NAMES UTF8");


if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

mysqli_select_db($dblink,"braingamesvocab")or die("cannot select DB"); 

$result=mysqli_query($dblink, "SELECT * 
                                FROM word 
                                ORDER BY Category");

while($rows=mysqli_fetch_array($result)){
echo "Word: " . $rows['Word'] . "| Meaning: " . $rows['Meaning'] . "| Category: " . $rows['Category'];
echo "<br>";
}
?>