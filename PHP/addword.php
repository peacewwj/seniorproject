<?php header('Access-Control-Allow-Origin: *');
header('content-type: text/html; charset=utf-8');

//$dblink = mysqli_connect("localhost","root","","braingamesvocab");
$dblink = mysqli_connect("mysql13.000webhost.com","a4052879_admin","braingames2013","a4052879_bgv");
mysqli_query($dblink, "SET NAMES UTF8");

//Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


  //////////////////////////////////////////////////

$word = $_GET['Word'];

   

$result = mysqli_query($dblink,"SELECT * FROM word WHERE word='".$word."'");

while($row = mysqli_fetch_array($result))
  {
    //echo $row['word'];
  }

$records = mysqli_num_rows($result);

    if($records==0){



  /////////////////////////////////////////////////


if(isset($_GET['Word']) && isset($_GET['Meaning']) && isset($_GET['Category']) ){ //variable names according to db columns.

     //Lightly sanitize the GET's to prevent SQL injections and possible XSS attacks
     $word = $_GET['Word'];
     $meaning = $_GET['Meaning'];
     $category = $_GET['Category'];
     $sql = mysqli_query($dblink,"INSERT INTO word (WordID,Word,Meaning,Category) VALUES 
      (NULL,'$word','$meaning','$category')");



  if($sql){
     
          //The query returned true - now do whatever you like here.
          echo '999'//successful;
          
     }else{
     
          //The query returned false - you might want to put some sort of error reporting here. Even logging the error to a text file is fine.
          echo 'There was a problem saving your word. Please try again later.';
          
     }
     
}else{
     echo 'Your word ,meaning, or category wasnt passed in the request. Make sure you add ?word=YOUR_WORD&meaning=YOUR_MEANING&category=YOUR_CATEGORY to the tags.';
}

mysqli_close($dblink);//Close off the MySQL connection to save resources.


}else{

echo '666'//word already exists;

}

?>


