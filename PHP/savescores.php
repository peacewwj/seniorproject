
<?php
header('Access-Control-Allow-Origin: *');
header('content-type: text/html; charset=utf-8');

//$dblink = mysqli_connect("localhost","root","","braingamesvocab");
$dblink = mysqli_connect("mysql13.000webhost.com","a4052879_admin","braingames2013","a4052879_bgv");
mysqli_query($dblink, "SET NAMES UTF8");

if(isset($_GET['UserID']) && isset($_GET['Category']) && isset($_GET['Score'])){

     
     $UserID = $_GET['UserID'];
     $Category = $_GET['Category'];
     $Score = $_GET['Score'];

     //$Timesplayed = $_GET['Timesplayed'];
     $sql = mysqli_query($dblink, "INSERT INTO score (ScoreID,UserID,Category,Score) 
      VALUES (NULL,'$UserID', '$Category','$Score')");

     

     if($sql){
     
          //The query returned true - now do whatever you like here.
          echo 'Your score was saved. Congrats!';
                    
     }else{
     
          //The query returned false - you might want to put some sort of error reporting here. Even logging the error to a text file is fine.
          echo 'There was a problem saving your score. Please try again later.';
          
     }
     
}else{
     echo 'Your name or score wasnt passed in the request. Make sure you add ?UserID=USER_ID&Category=CATEGORY&Score=SCORE to the tags.';

}

mysqli_close($dblink);//Close off the MySQL connection to save resources.
?>