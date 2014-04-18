<?php
header('Access-Control-Allow-Origin: *');
header('content-type: text/html; charset=utf-8');

$dblink = mysqli_connect("mysql13.000webhost.com","a4052879_admin","braingames2013","a4052879_bgv");
//$dblink = mysqli_connect("localhost","root","","braingamesvocab");


// Connect to server and select database.
//mysqli_connect($dblink)or die("cannot connect"); 
//mysqli_select_db("braingamesvocab")or die("cannot select DB");

$UserID = $_GET['UserID'];
$Category = $_GET['Category'];


$result=mysqli_query($dblink,"SELECT CAST(AVG(Score) AS CHAR(4)) AS Average, COUNT(*) AS Num FROM score WHERE UserID = '$UserID' AND Category = '$Category'");


//$rows = mysqli_fetch_array($result);

//print_r($rows);

//Calculate Average Score

while($rows=mysqli_fetch_array($result)){
echo $rows['Average'] . "|" . $rows['Num'] . "|";
//echo $rows['Average'] . "|";
// close while loop 
}

// close MySQL connection 
mysqli_close($dblink);
?>

