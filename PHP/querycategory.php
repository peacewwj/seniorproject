<?php

header('Access-Control-Allow-Origin: *');
header('content-type: text/html; charset=utf-8');

//$dblink = mysqli_connect("localhost","root","","braingamesvocab");
$dblink = mysqli_connect("mysql13.000webhost.com","a4052879_admin","braingames2013","a4052879_bgv");


$result=mysqli_query($dblink,"SELECT Category FROM word Group BY Category");

mysqli_select_db($dblink,"braingamesvocab")or die("cannot select DB");
// Start looping rows in mysql database.
while($rows=mysqli_fetch_array($result)){
echo $rows['Category'] . "|";

// close while loop 
}

// close MySQL connection 
mysqli_close($dblink);

?>