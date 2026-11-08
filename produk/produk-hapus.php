<?php
// include database connection file
include '../koneksi.php';
 
// Get id from URL to delete that user
if (isset($_GET['Id_Produk'])) {
    $Id_Produk=$_GET['Id_Produk'];
}
 
// Delete user row from table based on given id
$result = mysqli_query($conn, "DELETE FROM produk WHERE Id_Produk='$Id_Produk'");
 
// After delete redirect to Home, so that latest user list will be displayed.
header("Location:produk-lihat.php");
?>