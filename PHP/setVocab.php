<?php header('Access-Control-Allow-Origin: *');

header('content-type: text/html; charset=utf-8');

$dblink = mysqli_connect("mysql13.000webhost.com","a4052879_admin","braingames2013","a4052879_bgv");

//$dblink = mysqli_connect("localhost","root","","braingamesvocab");

mysqli_query($dblink, "SET NAMES UTF8");
mysqli_select_db($dblink,"braingamesvocab")or die("cannot select DB");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
if(isset($_GET['category'])){
	
	$category = strip_tags(mysql_real_escape_string($_GET['category']));



 

$result=mysqli_query($dblink, "SELECT * 
                                FROM Word 
                                WHERE Category= '$category'
                                ORDER BY RAND() 
                                LIMIT 10");



while($rows=mysqli_fetch_array($result)){
echo $rows['Word'] . "|" . $rows['Meaning']."|" ;

}
}
else{
	echo'Your category wasnt passed in the request. Make sure you add ?category=CATEGORY_HERE to the tag.';
}
mysqli_close($dblink);
?>