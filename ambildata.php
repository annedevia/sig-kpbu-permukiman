<?php

$host = "localhost";
$username = "root";
$pass = "";
$db= "dbgis";

$conn = mysqli_connect ($host, $username, $pass, $db);
if (!$conn)
{
        die("Connection failed: ". mysqli_connect_error());
}

$sql = "SELECT * FROM kpbu";
$result = mysqli_query($conn, $sql);
// include "koneksi.php";
// $Q = mysql_query("SELECT * FROM jasaweb")or die(mysql_error());
if($result){
 $posts = array();
      if(mysqli_num_rows($result))
      {
             while($post = mysqli_fetch_assoc($result)){
                     $posts[] = $post;
             }
      }  
      $data = json_encode(array('results'=>$posts));
      echo $data;                     
}

?>