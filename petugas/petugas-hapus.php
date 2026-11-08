<?php
// include database connection file
include '../koneksi.php';
 
// Get id from URL to delete that user
if (isset($_GET['Id_Petugas'])) {
    $Id_Petugas=$_GET['Id_Petugas'];
}
 
// Delete user row from table based on given id
$result = mysqli_query($conn, "DELETE FROM petugas WHERE Id_Petugas='$Id_Petugas'");
 
// After delete redirect to Home, so that latest user list will be displayed.
header("Location:petugas-lihat.php");
?>