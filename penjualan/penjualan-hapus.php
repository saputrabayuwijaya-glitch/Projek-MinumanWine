<?php
// include database connection file
include '../koneksi.php';

// Get id from URL to delete that user
if (isset($_GET['Id_Penjualan'])) {
    $Id_Penjualan = $_GET['Id_Penjualan'];

    // First, delete related details to avoid foreign key constraint
    $deleteDetails = mysqli_query($conn, "DELETE FROM detail_penjualan WHERE Id_penjualan='$Id_Penjualan'");

    // Then delete the main sale record
    $result = mysqli_query($conn, "DELETE FROM penjualan WHERE Id_Penjualan='$Id_Penjualan'");

    // After delete redirect to Home, so that latest user list will be displayed.
    header("Location:penjualan-lihat.php");
} else {
    // If no Id_Penjualan provided, redirect back
    header("Location:penjualan-lihat.php");
}
?>