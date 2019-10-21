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

$sql = "SELECT * FROM kpbu where id_proyek=".$id;
$result = mysqli_query($conn, $sql);


// include "koneksi.php";
// $Q = mysqli_query("SELECT * FROM jasaweb where id_perusahaan=".$id)or die(mysql_error());
if($result){
 $posts = array();
      if(mysqli_num_rows($result))
      {
             while($post = mysqli_fetch_assoc($result)){
                     $posts[] = $post;
             }
      }  
      $data = json_encode(array('results'=>$posts));  
//       echo "data berhasil diambil";       
}
?>