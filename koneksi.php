<?php
$host = "localhost";
$user = "root";
$pass = "";
$name = "dbgis";

$koneksi = new mysqli($host, $user, $pass) or die("Koneksi ke database gagal!");

return $koneksi;
// mysql_select_db($name, $koneksi) or die("Tidak ada database yang dipilih!");
?>