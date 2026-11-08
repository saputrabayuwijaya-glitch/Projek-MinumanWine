<?php
// include database connection file
include '../koneksi.php';
 
// Get id from URL to delete that user
if (isset($_GET['Id_Pelanggan'])) {
    $Id_Pelanggan=$_GET['Id_Pelanggan'];
}
 
// Delete user row from table based on given id
$result = mysqli_query($conn, "DELETE FROM pelanggan WHERE Id_Pelanggan='$Id_Pelanggan'");
 
// After delete redirect to Home, so that latest user list will be displayed.
header("Location:pelanggan-lihat.php");
?>