<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $database = "sistem_penjualan";


 $conn = mysqli_connect($servername, $username, $password, $database);
 // mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>