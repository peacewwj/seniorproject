<?php 
header('Access-Control-Allow-Origin: *');
header('content-type: text/html; charset=utf-8');

//$dblink = mysqli_connect("localhost","root","","braingamesvocab");
$dblink = mysqli_connect("mysql13.000webhost.com","a4052879_admin","braingames2013","a4052879_bgv");
mysqli_query($dblink, "SET NAMES UTF8");

//Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
///////////////////////////////////////////////////////////////////////

  $username = $_GET['Username'];

   

$result = mysqli_query($dblink,"SELECT UserID FROM user WHERE Username='".$username."'");

while($row = mysqli_fetch_array($result))
  {
  echo $row['UserID'];
  }

$records = mysqli_num_rows($result);

    if($records==0){


if(isset($_GET['Fname']) && isset($_GET['Lname']) && isset($_GET['Username']) && isset($_GET['Password']) && isset($_GET['UserType']) ){

     //Lightly sanitize the GET's to prevent SQL injections and possible XSS attacks
     $firstname = $_GET['Fname'];
     $lastname = $_GET['Lname'];
     $username = $_GET['Username'];
     $password = $_GET['Password'];
     $usertype = $_GET['UserType'];
     
     $sql = mysqli_query($dblink, "INSERT INTO user (UserID,Fname,Lname,Username,Password,UserType) 
      VALUES (NULL,'$firstname','$lastname','$username','$password','$usertype')");

  if($sql){
     
          //The query returned true - now do whatever you like here.
          echo '999';
          
     }else{
     
          //The query returned false - you might want to put some sort of error reporting here. Even logging the error to a text file is fine.
          echo 'There was a problem with your registeration. Please try again later.';
          
     }
     
}else{
     echo 'Your registeration was not passed in the request. Make sure you add ?Fname=YOUR_FIRST_NAME&Lname=YOUR_LAST_NAME&Username=YOUR_USERNAME&Password=YOUR_PASSWORD&UserType=YOUR_USER_TYPE to the tags.';
}



} else{
        
    }

    ///////////////////////////////////////////////////////////////////////



mysqli_close($dblink);//Close off the MySQL connection to save resources.

?>


